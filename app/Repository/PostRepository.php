<?php


namespace App\Repository;

use App\Http\Requests\EditPostRequest;
use App\Http\Requests\PostRequest;
use App\Models\Post;

class PostRepository{
    public function createPost(PostRequest $postRequest){
        if($postRequest->hasFile('image')){
            $file = $postRequest->file('image');
            $fileExtension = $file->getClientOriginalExtension();
            $fileName = time().".".$fileExtension;
            $file->move('uploads',$fileName);
        }
        $post = new Post();
        $post->title = $postRequest->title;
        $post->image = $fileName;
        $post->content = $postRequest->content;
        $post->featured = $postRequest->featured;
        $post->categories_id = $postRequest->category_id;
        $post->user_id = $postRequest->user_id;
        $post->save();
        return $post;
        // return redirect('admin/posts');
    }
    public function updatePost(EditPostRequest $editPostRequest,$id){
        $post = Post::find($id);
        $post->title = $editPostRequest->title;
        $post->content = $editPostRequest->content;
        $post->featured = $editPostRequest->featured;
        $post->categories_id = $editPostRequest->category_id;
        $post->user_id = $editPostRequest->user_id;
        if($editPostRequest->hasFile('image')){
            $file = $editPostRequest->file('image');
            $fileName =time().".".$file->getClientOriginalExtension();
            $file->move('uploads',$fileName);
            $post->image = $fileName;
        }
        
        return $post->save();
    }
}