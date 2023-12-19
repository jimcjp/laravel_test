<?php

namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
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
        return [
            'name' => 'required|min:4|max:32',
            'email' => 'required|email',
        ];
    }

    public function messages()
    {
        return [
        'name.required' => '請填寫用戶名',
        'name.min' => '用戶名不能小於4個字母',
        'name.max' => '用戶名不能大於32個字母',
        ];
    }



}
