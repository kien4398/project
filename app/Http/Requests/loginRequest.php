<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class loginRequest extends FormRequest
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
            "userName"=>"required",
            "password"=>"required|min:3"
        ];
    }
    public function messages() {
        return [
            "userName.required"=>"username không được để trống !",
            "password.required"=>"Mật khẩu không được để trống !",
            "password.min"=>"Mật khẩu không được ít hơn 3 ký tự !",
        ];
    }
}
