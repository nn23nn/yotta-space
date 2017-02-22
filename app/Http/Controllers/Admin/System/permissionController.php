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

        $data['permissions'] = $this->permissionService->getPermissionListByGroupId($permissionGroupConfig->id);
        $json['content']     = (string) view('admin.system.permission.permissionList', $data);
        return response()->json($json);
        //return view('permission.permissionList', $data);
    }

    public function createGroupConfig()
    {
        $json['content'] = (string) view('admin.system.permission.addGroupConfig');
        return response()->json($json);
    }

    public function createPermission()
    {
        $data['groupList'] = $this->permissionService->getAllGroup();

        $json['content'] = (string) view('admin.system.permission.addPermission', $data);
        return response()->json($json);
    }

    public function editPermission(Permission $permission)
    {
        $data['groupPermission'] = $this->permissionService->getPermissionGroup($permission->id);
        $data['groupList']       = $this->permissionService->getAllGroup();
        $data['permission']      = $permission;

        $json['content'] = (string) view('admin.system.permission.editPermission', $data);
        return response()->json($json);
    }

    public function editGroupConfig(PermissionGroupConfig $permission)
    {

        $json['content'] = (string) view('admin.system.permission.editGroupConfig', ['permission' => $permission]);
        return response()->json($json);
    }

    public function saveGroupConfig(PermissionGroupConfigRequest $request)
    {
        $permission = $this->permissionService->saveGroupConfig($request);
        return response()->json($permission);
    }

    public function savePermission(PermissionRequest $request)
    {
        $permission = $this->permissionService->savePermission($request);
        return response()->json($permission);
    }

    public function destoryGroupConfig()
    {
        $result = $this->permissionService->destoryGroupConfig();
        $data   = ['success' => $result, 'msg' => $result ? '删除成功' : '删除失败'];
        return response()->json($data);
    }

    public function destoryPermission()
    {
        $result = $this->permissionService->destoryPermission();
        $data   = ['success' => $result, 'msg' => $result ? '删除成功' : '删除失败'];
        return response()->json($data);
    }
}
