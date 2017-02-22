<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class RoleRequest extends Request
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
        $permissionId = $this->input('id', 0);
        $nameRule = $permissionId ? 'required|min:4|max:18|unique:roles,name,' . $permissionId : 'required|min:4|max:18|unique:roles,name';
        $displayNameRule = $permissionId ? 'required|unique:roles,display_name,' . $permissionId : 'required|unique:roles,display_name';
        return [
            'name' => $nameRule,
            'display_name' => $displayNameRule
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
            'name.required' => '请填写角色名称',
            'name.max' => '角色名称过长，请不要超出18个字符',
            'name.min' => '角色名称过短，至少4个字符',
            'name.unique' => '角色名称已存在',
            'display_name.required' => '请填写角色描述',
            'display_name.unique' => '角色描述已存在'
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
