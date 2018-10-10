<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home() {
        $title = "A Cool Blog With Laravel";
        return view('pages.home')->with('title', $title);
    }

}
