<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LabelStoreRequest extends Request
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
            'labelname' => 'required',   
            'labelcolor' => 'required|regex:/^#{1}[\w]{6}$/',
            // 'articlenumber' => 'required',
        ];
    }
    
    public function messages()
    {
        return [
            'label.required' => '标签名必填',
            'labelcolor.required' => '标签显示背景色必填',
            'labelcolor.regex' => '颜色格式错误',
        ];
    }
}
