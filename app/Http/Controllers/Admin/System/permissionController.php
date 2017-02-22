<?php

namespace App\Http\Controllers\Admin\System;

use App\Http\Controllers\Controller;
use App\Http\Requests\PermissionGroupConfigRequest;
use App\Http\Requests\PermissionRequest;
use App\Models\Permission;
use App\Models\PermissionGroupConfig;
use App\Services\PermissionService;

class PermissionController extends Controller
{
    public function __construct(PermissionService $permissionService)
    {
        parent::__construct();
        $this->permissionService = $permissionService;
    }
    //groupList
    public function index()
    {
        $groupList = $this->permissionService->getGroupList();
        return view('admin.system.permission.groupList', compact('groupList'));
    }

    public function permissionList(PermissionGroupConfig $permissionGroupConfig)
    {
        $permissions = $this->permissionService->getPermissionListByGroupId($permissionGroupConfig->id);
        return view('admin.system.permission.permissionList', compact('permissions'));
    }

    public function createGroupConfig()
    {
        return view('admin.system.permission.addGroupConfig');
    }

    public function createPermission()
    {
        $groupList = $this->permissionService->getAllGroup();
        return view('admin.system.permission.addPermission', compact('groupList'));
    }

    public function editPermission(Permission $permission)
    {
        $data['groupPermission'] = $this->permissionService->getPermissionGroup($permission->id);
        $data['groupList']       = $this->permissionService->getAllGroup();
        $data['permission']      = $permission;
        return view('admin.system.permission.editPermission', compact('data'));
    }

    public function editGroupConfig(PermissionGroupConfig $permission)
    {
        return view('admin.system.permission.editGroupConfig', compact('permission'));
    }

    public function saveGroupConfig(PermissionGroupConfigRequest $request)
    {
        $permission = $this->permissionService->saveGroupConfig($request);
        $data   = ['success' => $permission ? true : false, 'msg' => $permission ? '添加成功' : '添加失败'];        
        return view('admin.message', ['data' => $data , 'redirect_url' => '/admin/system/permission']);
    }

    public function savePermission(PermissionRequest $request)
    {
        $permission = $this->permissionService->savePermission($request);
        $data   = ['success' => $permission ? true : false, 'msg' => $permission ? '添加成功' : '添加失败'];        
        return view('admin.message', ['data' => $data , 'redirect_url' => '/admin/system/permission']);
    }

    public function destoryGroupConfig($id)
    {
        $result = $this->permissionService->destoryGroupConfig($id);
        $data   = ['success' => $result, 'msg' => $result ? '删除成功' : '删除失败'];        
        return view('admin.message', ['data' => $data , 'redirect_url' => '/admin/system/permission']);
    }

    public function destoryPermission($id)
    {
        $result = $this->permissionService->destoryPermission($id);
        $data = ['success' => $result, 'msg' => $result ? '删除成功' : '删除失败'];
        return view('admin.message', ['data' => $data , 'redirect_url' => '/admin/system/permission']);
    }
}
