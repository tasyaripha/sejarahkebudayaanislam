<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class SiteController extends Controller
{
  
    public function home()
    {
        $posts = Post::paginate(3);
        return view('sites.home', compact(['posts']));
    }
 

    public function singlepost($slug)
    {
        $post = Post::where('slug', '=' ,$slug)->first();
        return view ('sites.singlepost', compact(['post']));
    }

 
}
