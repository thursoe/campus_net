<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $file = $request->file('image');

        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpg,png,jpeg'
        ]);

        $credentials = [
            'title' => $request->input('title'),
            'description' => $request->input('description'),
        ];

        $credentials['user_id'] = Auth::user()->id;

        if ($request->hasFile('image')) {
            $filename = uniqid() . '.' . $file->extension();
            $file->storeAs('public/posts/images', $filename);
            $credentials['image'] = $filename;
        }

        Post::create($credentials);

        return back();
    }

    public function delete($id)
    {
        DB::table('posts')->where('id',$id)->delete();

        return redirect()->route('posts.index');
    }
}
