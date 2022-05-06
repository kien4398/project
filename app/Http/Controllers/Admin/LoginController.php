<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\loginRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class LoginController extends Controller
{
    //
    public function login(){
        return view('backend/login');
    }
    public function postLogin(loginRequest $loginRequest){

        if(Auth::attempt(['userName'=>$loginRequest->userName, 'password'=>$loginRequest->password])){
            return redirect('/admin');
        }else{
            return redirect()->back()->withErrors('Tên đăng nhập không chính xác');
        }
    }
}
