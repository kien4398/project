<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class LanguageController extends Controller
{
    public function langVi(){
        Session::put('lang' , 'vi');
        return redirect()->back();
    }
    
    public function langEn(){
        Session::put('lang' , 'en');
        return redirect()->back();
    }
}
