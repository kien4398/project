<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function category(){
        return view('backend/category');
    }
    public function addcategory(){
        return view('backend/addcategory');
    }
    public function createcategory(){
        return view('backend/addcategory');
    }
    public function editcategory(){
        return view('backend/editcategory');
    }
    public function updatecategory(){
        return view('backend/editcategory');
    }
    public function deletecategory(){
        
    }
}
