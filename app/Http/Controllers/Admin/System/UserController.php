<?php

namespace App\Http\Controllers\Admin\System;

use Illuminate\Http\Request;

use App\Http\Requests\UserRequest;
use App\Http\Controllers\Controller;
use App\Services\UserService;
use App\Models\User;
use App\Models\Role;
use Auth;

class UserController extends Controller
{
    public function __construct(UserService $userService)
    {
        parent::__construct();
        $this->userService = $userService;
    }

    public function index()
    {
    	$user = Auth::user();
        $users = $this->userService->getList();
        return view('admin.system.user.list', compact('users'));
    }

    public function getJQTableData()
    {
        echo json_encode($this->userService->getJQTableData());
    }

    public function getJQGridData()
    {
        echo json_encode($this->userService->getJQGridData());
    }

    public function create()
    {
        $roles = Role::all();
        return view('admin.system.user.add', compact('roles'));
    }

    public function edit(User $user)
    {
        $data['roles'] = Role::all();
        foreach ($data['roles'] as $key => $val) {
            if ($user->hasRole($val->name)) {
                $data['roles'][$key]->selected = true;
            }
        }
        $data['user'] = $user;
        return view('admin.system.user.edit', compact('data'));
    }

    public function save(UserRequest $request)
    {print_r($request->all());exit;
        $user = $this->userService->save($request);
        return response()->json($user);
    }

    public function destroy()
    {
        $result = $this->userService->destroy();
        $data = ['success' => $result, 'msg' => $result ? '删除成功' : '删除失败'];
        return response()->json($data);
    }

    public function menu()
    {
        return view('admin.system.user.sidebar');
    }
}
