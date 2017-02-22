<?php

namespace App\Services;

use App\Models\Member;
use Request;

class MemberService extends BaseService
{
    
    public function getList()
    {
        Request::flash();
        $orderBy = Request::input('orderBy', 'id');
        $sort = Request::input('sort', 'desc');
        $page = (int) Request::input('page', 1);
        $length = (int) Request::input('length', 10);
        $start = ($page - 1) * $length;
        $users = Member::orderBy($orderBy, $sort)->skip($start)->paginate($length);
        return $users;
    }

    public function find($id)
    {
        return Member::find((int) $id);
    }

    public function destroy($id = 0)
    {
        $ids = $id ? [$id] : Request::input('ids', 0);
        $users = Member::whereIn('id', $ids)->get();

        foreach ($users as $user) {
            $user->delete();
        }

        return true;
    }

    public function save($request)
    {
        $userId = $request->input('id', 0);
        $user = Member::firstOrNew(['id' => $userId]);
        $user->username = $request->username;
        $user->phone = $request->phone;
        if (!empty($request->password)) {
            $user->password = md5($request->password);
        }
        $user->save();

        return $user;
    }
}
