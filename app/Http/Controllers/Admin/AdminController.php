<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    public function admin(){
        $user = User::all();
        $post = Post::all();
        return view('backend/index',['user' => $user, 'post' => $post]); 
    }
    public function logout(){
        Auth::logout();
        return redirect('login');
    }

    
    
}
