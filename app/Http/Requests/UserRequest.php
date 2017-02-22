<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class UserRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $userId       = $this->input('id', 0);
        $nameRule     = $userId ? 'required|min:4|max:18|unique:users,name,' . $userId : 'required|min:4|max:18|unique:users,name';
        $emailRule    = $userId ? 'required|email|unique:users,email,' . $userId : 'required|email|unique:users,email';
        $passwordRule = $userId ? 'required|regex:/^(?![^a-zA-Z]+$)(?!\D+$).{8,15}$/|between:8,16' : 'required|regex:/^^(?![^a-zA-Z]+$)(?!\D+$).{8,15}$/|between:8,16';
        return [
            'name'       => $nameRule,
            'email'      => $emailRule,
            'password'   => $passwordRule,
            'repassword' => 'same:password',
            'role_id'    => 'required|exists:roles,id',
        ];
    }

    /**
     * 自定义验证信息
     *
     * @return array
     */
    public function messages()
    {
        return [
            'name.required'     => '请填写昵称',
            'name.max'          => '昵称过长，请不要超出18个字符',
            'name.min'          => '昵称过短，至少4个字符',
            'name.unique'       => '昵称已存在',
            'email.required'    => '请填写邮箱',
            'email.unique'      => '邮箱已存在',
            'password.required' => '请填写密码',
            'password.min'      => '密码过短，至少8个字符',
            'password.max'      => '密码过长，请不要超出18个字符',
            'password.regex'    => '密码必须包含数字和字母',
            'repassword.same'   => '2次密码不一致',
            'role_id.required'  => '请选择角色',
            'role_id.exists'    => '系统不存在该角色',
        ];
    }

    /**
     * 自定义错误数组
     *
     * @return array
     */
    public function formatErrors(Validator $validator)
    {
        $errors = ['errors' => $validator->errors()->all()];
        return $errors;
    }
}
