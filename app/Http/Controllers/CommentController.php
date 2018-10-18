<?php

namespace App\Http\Controllers;
use App\Post;
use App\Comment;

use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Post $post) {

        Comment::create([
            'name' => request('name'),
            'email' => request('email'),
            'body' => request('body'),
            'post_id' => $post->id
        ]);

        return back()->with('success', 'Comment added');
    }
}
