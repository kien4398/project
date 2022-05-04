<?php


namespace App\Repository;

use App\Http\Requests\EditPostRequest;
use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\traits\ImageTrait;
use Illuminate\Support\Facades\Auth;

class PostRepository{
    use ImageTrait;

    public function createNewPost($data){
        $dataCreate = [
            'title' => $data['title'],
            'content' => $data['content'],
            'featured' => $data['featured'],
            'categories_id' => $data['category_id'],
            'user_id' => Auth::check() ? Auth::user()->id : 0,

            'image' =>isset($data['image']) ? $this->imageUpload($data,'image','uploads') : '695787.png',
        ];


        return Post::create($dataCreate);
    }

    public function updateNewPost(Post $post,$data){

        $dataUpdate = [
            
            'title' => isset($data['title']) ? $data['title'] : $post->title,
            'content' =>  isset($data['content']) ? $data['content'] : $post->content,
            'featured' =>  isset($data['featured']) ? $data['featured'] : $post->featured,
            'categories_id' =>  isset($data['category_id']) ? $data['category_id'] : $post->category_id,
            'user_id' => Auth::check() ? Auth::user()->id : 0,
            'image' =>isset($data['image']) ? $this->imageUpload($data,'image','uploads') : $post->image,
        ];

        $update = $post->update($dataUpdate);

        return $update ? $post : false;
    }
  
}