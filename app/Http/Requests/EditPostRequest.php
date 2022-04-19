<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditPostRequest extends FormRequest
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
            'title' => ['required',Rule::unique('posts')->ignore($this->id)],
            'content' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'title.required' => 'tên bài không được để trống',
            'title.unique' => 'Tên bài không được trùng',
            'content.required' => 'nội dung không được để trống',
        ];
    }
}
