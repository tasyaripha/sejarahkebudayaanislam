<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Forum;
use App\Models\Komentar;

class ForumController extends Controller
{
    public function index()
    {
        $forum = Forum::paginate(10);
        return view('forum.index',compact(['forum']));
    }

    public function view(Forum $forum)
    {
        return view('forum.view',compact(['forum']));
    }

    public function postkomentar(Request $request)
    {
        $request->request->add(['user_id' => auth()->user()->id]);
        $komentar = Komentar::create($request->all());
        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan');
    }
}
