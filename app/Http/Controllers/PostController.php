<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Post;

class PostController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "Blog";
        $subtitle = "travel posts diary";

        $posts = Post::orderBy('created_at', 'desc')->paginate(12);
        return view('blog.index')->with(['title' => $title, 'subtitle' => $subtitle, 'posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add New Post";

        return view('blog.new')->with('title', $title);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
            'featured_image' => 'image|nullable|max:1999'
        ]);

        // Handle Featured Image Upload
        if($request->hasFile('featured_image')){
            // get full filename
            $filenameWithExt = $request->file('featured_image')->getClientOriginalName();
            // get just file name without extension
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // get file extension
            $extension = $request->file('featured_image')->getClientOriginalExtension();
            // get full file name with timestamp in it for unique names
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // upload image to featured images directory
            $path = $request->file('featured_image')->storeAs('public/featured_images', $fileNameToStore);
        } else {
            $fileNameToStore = "noimage.jpg";
        }

        $post = new Post;
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        $post->featured_image = $fileNameToStore;
        $post->save();

        return redirect('/blog')->with('success', "Post Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, $slug = '')
    {
        $post = Post::find($id);

        if ($slug !== $post->slug) {
            return redirect()->to($post->url);
        }

        return view('blog.show')->with('post', $post);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $post = Post::find($id);
        return view('blog.edit')->with('post', $post);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'title' => 'required',
            'body' => 'required',
        ]);

        // Handle Featured Image Upload
        if($request->hasFile('featured_image')){
            // get full filename
            $filenameWithExt = $request->file('featured_image')->getClientOriginalName();
            // get just file name without extension
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // get file extension
            $extension = $request->file('featured_image')->getClientOriginalExtension();
            // get full file name with timestamp in it for unique names
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // upload image to featured images directory
            $path = $request->file('featured_image')->storeAs('public/featured_images', $fileNameToStore);
        }

        $post = Post::find($id);
        $post->title = $request->input('title');
        $post->body = $request->input('body');
        $post->user_id = auth()->user()->id;
        if($request->hasFile('featured_image')){
            $post->featured_image = $fileNameToStore;
        }
        $post->save();

        return redirect($post->url)->with('success', "Post Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);

        // Check if user id matches the post user id to authorize delete
        if(auth()->user()->id !== $post->user_id){
            return redirect('/blog')->with('error', 'Unauthorized Page');
        }

        // Delete image if its not noimage.jpg
        if($post->featured_image != "noimage.jpg"){
            Storage::delete('public/featured_images/'.$post->featured_image);
        }

        $post->delete();
        return redirect('/blog')->with('success', 'Post Deleted');
    }
}
