<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->get();

        return view('posts.index', ['posts' => $posts]);
    }

    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'title'=> 'required',
            'description' => 'required'
        ]);

        $credentials['user_id'] = Auth::user()->id;

        Post::create($credentials);

        return back();
    }
}
