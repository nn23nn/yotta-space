<?php

namespace App\Services;

use App\Models\User;
use Request;

class UserService extends BaseService
{
    
    public function getList()
    {
        Request::flash();
        $email = Request::input('email');
        $orderBy = Request::input('orderBy', 'id');
        $sort = Request::input('sort', 'desc');

        $page = (int) Request::input('page', 1);
        $length = (int) Request::input('length', 10);
        $start = ($page - 1) * $length;

        $users = User::likeEmail($email)->orderBy($orderBy, $sort)->skip($start)->paginate($length);

        return $users;
    }

    public function find($id)
    {
        return User::find((int) $id);
    }

    public function destroy($id = 0)
    {
        $ids = $id ? [$id] : Request::input('ids', 0);
        $users = User::whereIn('id', $ids)->get();

        foreach ($users as $user) {
            $user->roles()->detach($user->id);
            $user->delete();
        }

        return true;
    }

    public function save($request)
    {
        $userId = $request->input('id', 0);
        $user = User::firstOrNew(['id' => $userId]);
        $user->name = $request->name;
        $user->email = $request->email;
        if (!empty($request->password)) {
            $user->password = bcrypt($request->password);
        }
        $user->save();

        $roleId = $request->input('role_id', 0);
        //$role = User::find($userId)->role;
        if($rs = User::find($userId)){
            $role = $rs->role;
            if ($role->role_id != $roleId) {
                $role->role_id = $roleId;
                $role->save();
            }
        } else {
            $user->roles()->attach($roleId);
        }

        //$roleId && !$userId && $user->roles()->attach($roleId);

        return $user;
    }
}
