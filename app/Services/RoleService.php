<?php

namespace App\Services;

use App\Models\PermissionGroup;
use App\Models\Role;
use App\Models\RoleUser;
use Request;

class RoleService extends BaseService
{
    public function __construct(RoleUser $roleUser, Role $role, PermissionGroup $permissionGroup, PermissionService $permissionService)
    {
        $this->roleUser          = $roleUser;
        $this->role              = $role;
        $this->permissionService = $permissionService;
        $this->permissionGroup   = $permissionGroup;

    }
    public function getList()
    {
        Request::flash();
        $field   = Request::input('field', 'name');
        $value   = Request::input('value');
        $orderBy = Request::input('orderBy', 'id');
        $sort    = Request::input('sort', 'desc');

        $page   = (int) Request::input('page', 1);
        $length = (int) Request::input('length', 10);
        $start  = ($page - 1) * $length;

        $likeMethod = 'like' . ucfirst(camel_case($field));

        $roles = Role::$likeMethod($value)->orderBy($orderBy, $sort)->skip($start)->paginate($length);

        return $roles;
    }

    public function find($id)
    {
        return Role::find((int) $id);
    }

    public function destroy()
    {
        $ids = Request::input('ids', 0);
        return $ids && Role::destroy($ids);
    }

    public function destoryUser($roleId)
    {
        $ids     = Request::input('ids', 0);
        $userIds = is_array($ids) ? $ids : array($ids);

        return $this->roleUser->destoryUser($roleId, $userIds);

        //return $ids && RoleUser::destroy($ids);
    }

    public function save($request)
    {
        $roleId             = $request->input('id', 0);
        $role               = Role::firstOrNew(['id' => $roleId]);
        $role->name         = $request->name;
        $role->display_name = $request->display_name;
        $role->description  = $request->description;
        $role->save();

        $permissionIds = $request->input('permissions', false);
        $permissionIds && $role->perms()->sync($permissionIds);

        return $role;
    }
    public function getRoleUserList($roleId)
    {
        return $this->roleUser->getRoleUserList($roleId);
    }

    public function getAllGroupList($role)
    {
        $groupConfigList = $this->permissionService->getAllGroup();
        $groupIdList     = array();

        foreach ($groupConfigList as $key => $val) {
            $groupIdList[] = $val['id'];
        }

        $perms = $role->perms()->get(['id']);

        $permissionList = $this->permissionGroup->getPermissionListByGroupIds($groupIdList);

        $temp = array();
        foreach ($permissionList as $key => $val) {
            foreach ($perms as $k => $v) {
                if ($v->id == $val->id) {
                    $val->checked = true;
                }
            }
            $temp[$val->group_id][] = $val;
        }
        foreach ($groupConfigList as $key => $val) {
            $groupConfigList[$key]['permission'] = isset($temp[$val->id]) ? $temp[$val->id] : array();
        }
        return $groupConfigList;
    }
}
