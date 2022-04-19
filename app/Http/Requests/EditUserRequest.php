<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EditUserRequest extends FormRequest
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
            //
            'firstName' => 'required',
            'lastName' => 'required',
            'userName' => ['required',Rule::unique('users')->ignore($this->id)],
            'password' => 'required',
        ];
    }
    public function messages()
    {
        return [
            //
            'firstName.required' => 'Tên không được để trống',
            'lastName.required' => 'Họ không được để trống',
            'userName.required' => 'User name không được để trống',
            'userName.unique' => 'User name không được trùng',
            'password.required' => 'Mật khẩu không được để trống',
        ];
    }
}
