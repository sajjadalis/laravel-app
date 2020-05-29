<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post) {

        // Comment::create([
        //     'name' => request('name'),
        //     'email' => request('email'),
        //     'body' => request('body'),
        //     'post_id' => $post->id
        // ]);
        
        // getting addComments() method from Post model

        $this->validate(request(), [
            'name' => 'required|min:3',
            'email' => 'required|email',
            'comment' => 'required|min:5'
        ]);

        $post->addComments(compact('body', 'name', 'email'));

        return back()->with('success', 'Comment added');
    }
}
