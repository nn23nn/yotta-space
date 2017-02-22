<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class PermissionRequest extends Request
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
        $nameRule = $permissionId ? 'required|min:4|max:18|unique:permissions,name,' . $permissionId : 'required|min:4|max:18|unique:permissions,name';
        $displayNameRule = $permissionId ? 'required|unique:permissions,display_name,' . $permissionId : 'required|unique:permissions,display_name';
        $groupIdRule = 'required|min:1|integer';
        return [
            'name' => $nameRule,
            'display_name' 	=> $displayNameRule,
        	'group_id' 		=>$groupIdRule
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
            'name.required' => '请填写权限名称',
            'name.max' => '权限名称过长，请不要超出18个字符',
            'name.min' => '权限名称过短，至少4个字符',
            'name.unique' => '权限名称已存在',
            'display_name.required' => '请填写权限描述',
            'display_name.unique' => '权限描述已存在',
            'group_id.required' => '请选择权限分组',
        	
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
