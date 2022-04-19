<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditPostRequest;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Repository\PostRepository;
use Illuminate\Http\Request;

class PostController extends Controller
{
    protected $postRepository;

public function __construct()
{
    $this->postRepository =  new PostRepository();
}
    // public function __construct(){
    //     $this->middleware('permission: add posts| edit posts | delete posts| restore posts',['only'=>['posts']]);
    //     $this->middleware('permission: add posts',['only'=>['addPosts','createPosts']]);
    //     $this->middleware('permission: edit posts',['only'=>['editPosts','updatePosts']]);
    //     $this->middleware('permission: delete posts',['only'=>['deletePosts']]);
    //     $this->middleware('permission: restore post',['only'=>['trash','untrash']]);

    // }
    //
    public function posts(){
        $posts = Post::orderBy('id', 'desc')->with(['category','user'])->get();
        // foreach ($posts as $post) {
        //     $post->category->name = !is_null($post->category->name) ? $post->category->name : 'DG';
        //     $post->user->firstName = !is_null($post->user->firstName) ? $post->user->firstName : 'no name';
        // }
        $data['users'] = User::get()->toArray();
        $data['categories'] = Category::get()->toArray();
        return view('backend/posts/posts',$data,['posts' => $posts]);
    }
    public function addPosts(){
        $data['users'] = User::get()->toArray();
        $data['categories'] = Category::get()->toArray();
        return view('backend/posts/addposts',$data);
    }
    public function createPosts(PostRequest $postRequest){
        $this->postRepository->createPost($postRequest);
        return redirect()->route('posts');
    }
    public function editPosts($id){
        $post = Post::where('id', $id)->get()->toArray();
        $users = User::all()->toArray();
        $categories = Category::all()->toArray();
        return view('backend/posts/editposts',['post' => $post[0],'users'=>$users,'categories'=>$categories]);
    }
    public function updatePosts(EditPostRequest $editPostRequest, $id){

        $this->postRepository->updatePost($editPostRequest, $id);
        return redirect()->route('posts');
    }

    public function deletePosts(Request $request,$id) {
        $post = Post::find($id);
        if(is_null($post)){
            $request->session()->flash('error', 'Bài viết không tồn tại');
            return redirect()->route('posts');
        }
        $post->delete();
        // return redirect('admin/posts');
    }

    public function store(PostRequest $request){
            $file = $request->file('image');
            $fileName = time().".".$file->getClientOriginalExtension();
            $file->move('uploads', $fileName);
        $posts = 
            [
            'title' => $request->title,
            'image' => $fileName,
            'content' => $request->content,
            'featured' => $request->featured,
            'user_id' => $request->user_id,
            'categories_id' => $request->category_id,
            ];
        Post::create($posts);
        return response()->json([
            'status' => 200,
        ]);
    }


    public function trash(){
        $posts = Post::orderBy('deleted_at','desc')->with(['category','user'])->onlyTrashed()->get();
        return view('backend/posts/trash',['posts' => $posts]);
    }
    public function unTrash(Request $request, $id){
        $post = Post::withTrashed()->find($id);
        $post->restore();
        $request->session()->flash('success', 'Đã khôi phục thành công!');
        return redirect()->route('posts');
    }
}