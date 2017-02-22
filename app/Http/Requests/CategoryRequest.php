<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Contracts\Validation\Validator;

class CategoryRequest extends Request
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
        $categoryId = $this->input('id', 0);
        $parentId = $this->input('parent_id', 0);
        $parentRule = $parentId ? 'required|exists:category,id,' . $categoryId : '';
        $nameRule = $categoryId ? 'required|min:4|max:50|unique:category,name,' . $categoryId : 'required|min:4|max:50|unique:category,name';
        $aliasRule = $categoryId ? 'required|min:4|max:50|unique:category,alias,' . $categoryId : 'required|min:4|max:50|unique:category,alias';
        return [
            'parent_id' => $parentRule,
            'name' => $nameRule,
            'alias' => $aliasRule
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
            'name.required' => '请填写分类名称',
            'name.max' => '分类名称过长，请不要超出50个字符',
            'name.min' => '分类名称过短，至少4个字符',
            'name.unique' => '分类名称已存在',
            'alias.required' => '请填写别名',
            'alias.max' => '别名过长，请不要超出50个字符',
            'alias.min' => '别名过短，至少4个字符',
            'alias.unique' => '别名已存在',
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
