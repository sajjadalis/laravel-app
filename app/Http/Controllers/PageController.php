<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Page;
use App\Post;

class PageController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = "A Cool Blog With Laravel";
        $subtitle = "Laravel Get Things Done Smoothly";
        $pages = Page::all();
        $posts = Post::orderBy('created_at', 'desc')->take(3)->get();
        return view('pages.home')->with(['title' => $title, 'subtitle' => $subtitle, 'pages' => $pages, 'posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Add New Page";
        return view('pages.new')->with('title', $title);
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
            'slug' => 'nullable',
        ]);

        $page = new Page;
        $page->title = $request->input('title');
        $page->subtitle = $request->input('subtitle');
        $page->body = $request->input('body');
        $page->user_id = auth()->user()->id;
        $page->slug = str_slug($page->title);
        $page->save();

        return redirect('/')->with('success', "Page Created");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Page $page, $slug = '')
    {

        if ($slug !== $page->slug) {
            return redirect()->to($page->url);
        }

        return view('pages.show')->with('page', $page);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $title = "Edit";
        $page = Page::find($id);

        // Check if user id matches the page user id to authorize edit
        if(auth()->user()->id !== $page->user_id){
            return redirect($page->url)->with('error', 'Unauthorized Page');
        }

        return view('pages.edit')->with(['page' => $page, 'title' => $title]);

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
            'subtitle' => 'required',
            'body' => 'required',
        ]);

        $page = Page::find($id);
        $page->title = $request->input('title');
        $page->subtitle = $request->input('subtitle');
        $page->body = $request->input('body');
        $page->user_id = auth()->user()->id;
        $page->save();

        return redirect($page->url)->with('success', "Page Updated");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $page = Page::find($id);

        // Check if user id matches the page user id to authorize delete
        if(auth()->user()->id !== $page->user_id){
            return redirect($page->url)->with('error', 'Unauthorized Page');
        }

        $page->delete();
        return redirect('/')->with('success', 'Page Deleted');
    }
}
