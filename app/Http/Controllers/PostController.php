<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::all();        
        return view('posts.index', compact(['posts']));
    }

    public function add()
    {        
        return view('posts.add');
    }

    public function create(Request $request)
    {        
        $post = Post::create([
            'title' => $request->title,
            'content' => $request->content,
            'user_id' => auth()->user()->id,        
            'thumbnail' => $request->thumbnail
        ]);
        return redirect()->route('posts.index')->with('sukses', 'Post berhasil disubmit');
    }

    public function edit($id)
    {
        $post = Post::find($id);
        return view ('posts/edit', ['post' => $post]);
    }

    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $post->update($request->all());
        return redirect()->route('posts.index')->with('sukses', 'Post berhasil diupdate');
    }

    public function delete(Post $post)
    {                
        $post->delete($post);
        return redirect()->route('posts.index')->with('sukses', 'Post berhasil dihapus');
    }
}
