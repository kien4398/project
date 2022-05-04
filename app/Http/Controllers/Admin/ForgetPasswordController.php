<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mail;
use Carbon\Carbon;

class ForgetPasswordController extends Controller
{
    public function forgetPassword(){
        return view('auth/forget-password');
    }
    public function forgetPasswordStore(Request $request){
        $rules = ([
            'email' => 'required|email|exists:users',
        ]);

        $messages = ([
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không đúng định dạng.',
            'email.exists' => 'Email không tồn tại trong hệ thống.',
        ]);
        $request->validate($rules, $messages);
        $token = Str::random(20);
        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('auth.forget-password-email', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->from(env('MAIL_FROM_ADDRESS'), 'Admin VN-Express');
            $message->subject('Đặt lại mật khẩu');
        });

        return back()->with('message', 'Liên kết đặt lại mật khẩu đã được gửi vào email của bạn!');
    }
    public function resetPassword($token){
        return view('auth/reset-password',['token' => $token]);
    }
    public function resetPasswordStore(Request $request){
        $rules = ([
            'email' => 'required|email|exists:users',
            'password' => 'required|min:3',
        ]);
        $messages = ([
            'email.required' => 'Email không được để trống.',
            'email.email' => 'Email không đúng định dạng.',
            'email.exists' => 'Email không tồn tại trong hệ thống.',
            'password.required' => 'Password không được để trống.',
            'password.min' => 'Password lớn hơn 3 kí tự.',
        ]);
        $request->validate($rules, $messages);
        $update = DB::table('password_resets')->where(['email' => $request->email, 'token' => $request->token])->first();

        if(!$update){
            return back()->withInput()->with('error', 'Token không hợp lệ với email!');
        }

        $user = User::where('email', $request->email)->update(['password' => bcrypt($request->password)]);

        // Xóa bản ghi token
        DB::table('password_resets')->where(['email'=> $request->email])->delete();

        return redirect('/login')->with('message', 'Mật khẩu của bạn đã được thay đổi!');
    }
}
