<?php

namespace App\Services;

use App\Models\User;
use Request;

class UserService extends BaseService
{
    public function getJQTableData()
    {
        $start = (int) Request::input('start');
        $length = (int) Request::input('length', 25);
        $email = Request::input('email');
        $orderBy = Request::input('orderBy', 'id');
        $sort = Request::input('sort', 'desc');

        $users = User::likeEmail($email)->orderBy($orderBy, $sort)->skip($start)->paginate($length)->toArray();
        // 构造jquerytable数组
        $users['draw'] = (int) Request::input('draw');
        $users['recordsTotal'] = $users['total'];
        $users['recordsFiltered'] = $users['total'];
        return $users;
    }

    public function getJQGridData()
    {
        $page = (int) Request::input('page', 1);
        $length = (int) Request::input('row', 25);
        $start = ($page - 1) * $length;

        $search = Request::input('_search', false);
        $filters = $search ? json_decode(Request::input('filters')) : false;

        $orderBy = Request::input('sids', 'id');
        $sort = Request::input('sort', 'desc');

        $query = User::orderBy($orderBy, $sort);
        $query = $this->jqGridSearch($query, $filters);
        $users = $query->skip($start)->paginate($length)->toArray();

        // 构造jqgrid数组
        $users['total_pages'] = ceil($users['total'] / $length);
        // print_r($users);exit;
        return $users;
    }

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
        $ids = $id ? $id : Request::input('ids', 0);
        $users = $this->model->whereIn('id', $ids)->get();

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
        $role = User::find($userId)->role;

        if ($role) {
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
