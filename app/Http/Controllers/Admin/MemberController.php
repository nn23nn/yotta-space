<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests\MemberRequest;
use App\Http\Controllers\Controller;
use App\Services\MemberService;
use App\Models\Member;

class MemberController extends Controller
{
    public function __construct(MemberService $memberService)
    {
        parent::__construct();
        $this->memberService = $memberService;
    }

    public function index()
    {
        $users = $this->memberService->getList();
        return view('admin.member.list', compact('users'));
    }

    public function create()
    {
        return view('admin.member.add', compact('roles'));
    }

    public function edit(Member $member)
    {
        $data['member'] = $member;
        return view('admin.member.edit', compact('data'));
    }

    public function save(MemberRequest $request)
    {
        $user = $this->memberService->save($request);
        $data = ['success' => $user ? true : false, 'msg' => $user ? '添加成功' : '添加失败'];
        return view('admin.message', ['data' => $data , 'redirect_url' => '/admin/member']);
    }

    public function destroy($id)
    {
        $result = $this->memberService->destroy($id);
        $data = ['success' => $result, 'msg' => $result ? '删除成功' : '删除失败'];
        return view('admin.message', ['data' => $data , 'redirect_url' => '/admin/member']);
    }
}
