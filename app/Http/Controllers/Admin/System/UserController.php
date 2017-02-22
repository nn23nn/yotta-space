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
    {
        $user = $this->userService->save($request);
        $data = ['success' => $user ? true : false, 'msg' => $user ? '添加成功' : '添加失败'];
        return view('admin.message', ['data' => $data , 'redirect_url' => '/admin/system/user']);
    }

    public function destroy($id)
    {
        $result = $this->userService->destroy($id);
        $data = ['success' => $result, 'msg' => $result ? '删除成功' : '删除失败'];
        return view('admin.message', ['data' => $data , 'redirect_url' => '/admin/system/user']);
    }
}
