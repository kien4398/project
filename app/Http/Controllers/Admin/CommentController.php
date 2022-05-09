<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Validation\Validator;

class CommentController extends Controller
{
    public function comment(){
        $comments = Comment::all();
        return view('backend/comments/comment', compact('comments'));
    }
    public function edit($id){
        $comment = Comment::find($id);
        return view('backend/comments/edit_comment', compact('comment'));
    }
    public function update($id, Request $request){
        $request->validate([
            'body' => 'required',
        ]);
        $comment = Comment::find($id);
        $comment->body = $request->body;
        $comment->save();
        if ($comment) {
            return redirect()->route('comment.index');
        }else{
            return redirect()->back()->withInput();
        }
    }
    public function delete($id){
        $comment = Comment::find($id);
        $comment->delete();

        return response()->json([
            'code' => 200,
        ]);
        // return redirect()->route('comment.index');
    }
    public function trash(){
        $comments = Comment::orderBy('deleted_at','desc')->onlyTrashed()->get();
        return view('backend/comments/trash_comment', compact('comments'));
    }
    public function untrash($id){
        $comment = Comment::withTrashed()->find($id);
        $comment->restore();
        return redirect()->route('comment.index');
    }
}
