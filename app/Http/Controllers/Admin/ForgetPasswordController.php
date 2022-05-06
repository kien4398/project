<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ForgetPasswordRequest;
use App\Http\Requests\ResetPasswordRequest;
use App\Models\User;
use App\Repository\ForgetPasswordRepository;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mail;
use Carbon\Carbon;

class ForgetPasswordController extends Controller
{
    public function __construct(ForgetPasswordRepository $forgetPasswordRepository){
        $this->forgetPasswordRepository = $forgetPasswordRepository;
    }
    public function forgetPassword(){
        return view('auth/forget-password');
    }
    public function forgetPasswordStore(ForgetPasswordRequest $request){
        $this->forgetPasswordRepository->forgetPassword($request);
        return back()->with('message', 'Liên kết đặt lại mật khẩu đã được gửi vào email của bạn!');
    }
    public function resetPassword($token){
        return view('auth/reset-password',['token' => $token]);
    }
    public function resetPasswordStore(ResetPasswordRequest $request){
        
        $this->forgetPasswordRepository->resetPassword($request);

        return redirect('/login')->with('message', 'Mật khẩu của bạn đã được thay đổi!');
    }
}
