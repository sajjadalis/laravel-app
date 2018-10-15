<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class DashboardController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);

        return view('cp.dashboard')->with(['posts' => $user->posts, 'pages' => $user->pages]);
    }

    public function posts()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $posts = $user->posts()->orderBy('created_at', 'desc')->paginate(10);
        return view('cp.posts')->with('posts', $posts);
    }

    public function pages()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $pages = $user->pages()->orderBy('created_at', 'desc')->paginate(10);
        return view('cp.pages')->with('pages', $pages);
    }
}
