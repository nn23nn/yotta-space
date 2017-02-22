<?php

namespace App\Services;

use App\Models\Permission;
use App\Models\PermissionGroup;
use App\Models\PermissionGroupConfig;
use Request;

class PermissionService extends BaseService
{
    public function __construct(PermissionGroup $permissionGroup, PermissionGroupConfig $permissionGroupConfig, Permission $permission)
    {
        $this->permissionGroup       = $permissionGroup;
        $this->permissionGroupConfig = $permissionGroupConfig;
        $this->permission            = $permission;
    }

    //分组和权限的数据
    public function getGroupList()
    {

        $groupConfigList = $this->permissionGroupConfig->getGroupConfigList();
        return $groupConfigList;
    }

    public function getAllGroup()
    {
        return $this->permissionGroupConfig->getAll();
    }

    public function getPermissionListByGroupId($groupId)
    {
        return $this->permissionGroup->getPermissionListByGroupIds([$groupId]);
    }

    public function find($id)
    {
        return Permission::find((int) $id);
    }

    public function findGroupConfig($id)
    {
        return $this->permissionGroupConfig->getGroupConfigById((int) $id);
    }

    public function destoryGroupConfig()
    {
        $ids      = Request::input('ids', 0);
        $groupIds = is_array($ids) ? $ids : array($ids);

        //删除分组对应的权限
        $permissionIdList    = array();
        $groupPermissionList = $this->permissionGroup->getGroup($groupIds);
        foreach ($groupPermissionList as $val) {
            $permissionIdList[] = $val->permission_id;
        }
        $this->permission->deletePermission($permissionIdList);

        //删除对应关系表
        $this->permissionGroup->deleteGroup($groupIds);

        return $ids && $this->permissionGroupConfig->destroy($ids);
    }

    public function destoryPermission()
    {
        $ids            = Request::input('ids', 0);
        $permission_ids = is_array($ids) ? $ids : array($ids);

        //删除原有的对应关系
        $this->permissionGroup->deleteGroupByPermissionIds($permission_ids);

        return $permission_ids && $this->permission->deletePermission($permission_ids);

    }

    public function savePermission($request)
    {
        $groupId = $request->input('group_id');

        if (!$this->permissionGroupConfig->getGroupConfigById((int) $groupId)) {
            return false;
        }

        $permissionId             = $request->input('id', 0);
        $permission               = Permission::firstOrNew(['id' => $permissionId]);
        $permission->name         = $request->name;
        $permission->display_name = $request->display_name;
        $permission->description  = $request->description;

        $permission->save();

        //删除原有的对应关系
        $this->permissionGroup->deleteGroupByPermissionIds(array($permission->id));
        //添加对应分组和权限关系
        $permissionGroup = $this->permissionGroup->create(['group_id' => $groupId, 'permission_id' => $permission->id]);

        return $permission;
    }
    public function saveGroupConfig($request)
    {
        $groupId     = $request->input('id', 0);
        $group       = $this->permissionGroupConfig->firstOrNew(['id' => $groupId]);
        $group->name = $request->name;
        $group->save();

        return $group;
    }

    public function getPermissionGroup($permission_id)
    {
        return $this->permissionGroup->getGroupByPermissionId((int) $permission_id);
    }
}
