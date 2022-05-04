<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\EditPostRequest;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use App\Repository\PostRepository;
use App\traits\ImageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    use ImageTrait;

public function __construct(PostRepository $postRepository)
{
    $this->postRepository =  $postRepository;
}

    public function posts(){
        $posts = Post::orderBy('id', 'desc')->with(['category','user'])->get();
        $data['users'] = User::get();
        $data['categories'] = Category::get();
        return view('backend/posts/posts',$data,['posts' => $posts]);
    }
    public function addPosts(Request $request) {
        // if (! Gate::allows('add_post')) {
        //     abort(403);
        // }
        $this->authorize('add_post');

        $data['users'] = User::get()->toArray();
        $data['categories'] = Category::get()->toArray();
        return view('backend/posts/addposts',$data);
    }
    public function createPosts(PostRequest $postRequest){
        $this->authorize('add_post');

        $this->postRepository->createNewPost($postRequest);
        return redirect()->route('posts');
    }
    public function editPosts($id){
        $this->authorize('edit_post');
        
        $post = Post::where('id', $id)->get()->first();
        $categories = Category::all()->toArray();
        return view('backend/posts/editposts',['post' => $post,'categories'=>$categories]);
    }
    public function updatePosts(EditPostRequest $editPostRequest, $id){
        $this->authorize('edit_post');
        // $post = Post::find($id);
        $post = Post::whereId($id)->first();
        $this->postRepository->updateNewPost($post,$editPostRequest);
        return redirect()->route('posts');
    }

    public function deletePosts(Request $request,$id) {
        $this->authorize('delete_post');

        $post = Post::find($id);
        if(is_null($post)){
            $request->session()->flash('error', 'Bài viết không tồn tại');
            return redirect()->route('posts');
        }
        $post->delete();
        return response()->json([
            'code' => 200,
        ]);
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
            'code' => 200,
        ]);
    }


    public function trash(){
        
        $this->authorize('restore_post');

        $posts = Post::orderBy('deleted_at','desc')->with(['category','user'])->onlyTrashed()->get();
        return view('backend/posts/trash',['posts' => $posts]);
    }
    public function unTrash(Request $request, $id){
        $this->authorize('restore_post');

        $post = Post::withTrashed()->find($id);
        $post->restore();
        $request->session()->flash('success', 'Đã khôi phục thành công!');
        return redirect()->route('posts');
    }
}