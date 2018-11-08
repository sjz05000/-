<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UsersStoreRequest extends Request
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
        // 验证规则
        return [
            'username' => 'required|unique:dy-users|regex:/^[a-zA-Z]{1}[\w]{7,15}$/',
            'password' => 'required|regex:/^[\w]{6,18}$/',
            'repassword' => 'required|same:password',
            'phone' => 'required|regex:/^1{1}[345678]{1}[\d]{9}$/',
            'email' => 'email',
        ];      
    }
    
    public function messages()
    {
        return [
            'username.required' => '用户名必填',
            'username.regex' => '用户名格式错误',
            'username.unique' => '用户已存在',
            'password.required' => '密码必填',
            'password.regex' => '密码格式错误',
            'repassword.required' => '确认密码必填',
            'repassword.same' => '两次密码不一致',
            'phone.required' => '手机号必填',
            'phone.regex' => '手机号格式错误',
            'email.email' => '邮箱格式错误',
        ];
    }
}
