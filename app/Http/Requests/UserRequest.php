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
            //
            'firstName' => 'required',
            'lastName' => 'required',
            'userName' => 'required|unique:users',
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
            'userName.unique' => 'User name đã tồn tại',
            'password.required' => 'Mật khẩu không được để trống',
        ];
    }
}
