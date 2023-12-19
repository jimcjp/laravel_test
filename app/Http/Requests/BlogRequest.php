<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogRequest extends FormRequest
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
            'title' => 'required|min:4|max:32',
            'content' => 'required|min:4',
            'category_id' => 'required|gt:0',
        ];
    }


    public function messages()
    {
        return [
            'title.required' => '標題必填',
            'title.min' => '標題最少4個字符',
            'title.max' => '標題最多32個字符',
            'content.required' => '內容必填',
            'content.min' => '內容最少4字符',
            'category_id.required' => '分類必填',
            'category_id.gt' => '分類必填',
        ];
    }
}
