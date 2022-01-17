<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostinganController extends Controller
{
    public function index()
    {
        $postingan = \App\Models\Postingan::all();
        return view('postingan.index',['postingan' => $postingan]);
    }
}
