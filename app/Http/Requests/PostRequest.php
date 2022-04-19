<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
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
            'image' => 'required',
            'title' => 'required|unique:posts',
            'content' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'image.required' => 'ảnh không được để trống',
            'title.required' => 'tên bài không được để trống',
            'title.unique' => 'Tên bài không được trùng',
            'content.required' => 'nội dung không được để trống',
        ];
    }
}
