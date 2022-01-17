<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PageController extends Controller
{
    public function about()
    {
        return view('pages.about');
    }

    public function artikel()
    {
        $posts = Post::all();
        return view('pages.artikel', compact(['posts']));
    }
}
