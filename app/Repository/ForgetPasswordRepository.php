<?php

namespace App\Repository;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Mail;

class ForgetPasswordRepository{
    public function forgetPassword($data){
        $token = Str::random(20);
        DB::table('password_resets')->insert([
            'email' => $data->email,
            'token' => $token,
            'created_at' => Carbon::now()
        ]);

        Mail::send('auth.forget-password-email', ['token' => $token], function($message) use($data){
            $message->to($data->email);
            $message->from(env('MAIL_FROM_ADDRESS'), 'Admin VN-Express');
            $message->subject('Đặt lại mật khẩu');
        });
    }
    public function resetPassword($data){
        $update = DB::table('password_resets')->where(['email' => $data->email, 'token' => $data->token])->first();

        if(!$update){
            return back()->withInput()->with('error', 'Token không hợp lệ với email!');
        }

        $user = User::where('email', $data->email)->update(['password' => bcrypt($data->password)]);

        // Xóa bản ghi token
        DB::table('password_resets')->where(['email'=> $data->email])->delete();
    }
}