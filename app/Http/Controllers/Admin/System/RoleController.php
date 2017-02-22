<?php

namespace App\Http\Controllers\Admin\System;

use Illuminate\Http\Request;

use App\Http\Requests\RoleRequest;
use App\Http\Controllers\Controller;
use App\Services\RoleService;
use App\Models\Role;
use App\Models\Permission;
use App\Models\RoleUser;
use App\Services\PermissionService;


class RoleController extends Controller
{
    public function __construct(RoleService $roleService, PermissionService $permissionService)
    {
        parent::__construct();
        $this->roleService = $roleService;
        $this->permissionService = $permissionService;
       
    }

    public function index()
    {
        $roles = $this->roleService->getList();
        return view('admin.system.role.list', compact('roles'));
    }

    public function roleUser()
    {
    	$roleId = $_GET['roleid'];
    	
    }
    
    public function create()
    {
        $groupList = $this->roleService->getAllGroupList(new Role());
        return view('admin.system.role.add', compact('groupList'));
    }

    public function edit(Role $role)
    {
        $data['groupList'] = $this->roleService->getAllGroupList($role);
        $data['role'] = $role;
        return view('admin.system.role.edit', compact('data'));
    }

    public function save(RoleRequest $request)
    {
        $role = $this->roleService->save($request);
        return response()->json($role);
    }

    public function destroy()
    {
        $result = $this->roleService->destroy();
        $data = ['success' => $result, 'msg' => $result ? '删除成功' : '删除失败'];
        return response()->json($data);
    }
    
    public function destoryUser(Role $role)
    {
    	$result = $this->roleService->destoryUser($role->id);
        $data = ['success' => $result, 'msg' => $result ? '删除成功' : '删除失败'];
        return response()->json($data);
    	return null;
    }
    
    public function userList(Role $role)
    {
    	
    	$roleUserList = $this->roleService->getRoleUserList($role->id);
    	$data['roleUserList'] = $roleUserList;
    	$json['content'] = (string)view('admin.system.role.userList', $data);
    	return response()->json($json);
    }
}
