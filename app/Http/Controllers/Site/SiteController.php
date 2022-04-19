<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class SiteController extends Controller
{
    //
    public function index(){
        $categories = Category::all();
        
        $featured = Post::orderBy('id', 'desc')->where('featured',1)->limit(4)->get()->toArray();
        // $query = Post::orderBy('id', 'desc');
        // $query = $query->where('featured',1)->limit(4);
        // $featured = $query->get()->toArray();
        $latest = Post::orderBy('id', 'desc')->limit(3)->get()->toArray();
        
        return view('frontend/index', ['categories'=>$categories, 'featured' => $featured,'latest' => $latest,]);
    }
    public function search(Request $request){
        $categories = Category::all();

        $keyword = $request->keyword;
        $arr_keyword = explode(' ',$keyword);
        $str_keyword = '%'.implode('%',$arr_keyword).'%';
        // $posts = Post::orderBy('id', 'desc')->where('title','like',$str_keyword)->orWhere('content','like',$str_keyword)->paginate(3);
        $posts = Post::orderBy('id', 'desc')->where(function($query) use ($str_keyword){
                $query->where('title','like',$str_keyword)->orWhere('content','like',$str_keyword);
        })->paginate(3);
        // dd($posts);
        return view('frontend/search',['categories'=>$categories,'posts'=>$posts, 'keyword'=>$keyword]);
    }
    public function details($title){
        $categories = Category::all();

        $post = Post::where('title',$title)->get()->toArray();
        // dd($post[0]);
        return view('frontend/details',['categories'=>$categories, 'post' => $post[0]]);
    }
    public function category($id){
        $categories = Category::all();
        $category = Category::where('id',$id)->get();
        $post = Category::where('id',$id)->first()->post()->get();
        // dd($post);
        // dd($category[0]);
        return view('frontend/category',['categories'=>$categories,'category'=>$category[0], 'post'=>$post]);
    }
}
