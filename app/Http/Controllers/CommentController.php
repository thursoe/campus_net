<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function store(Request $request,$id)
    {

        $request->validate([
            'message' => 'required',
        ]);

        $credentials = [
            'message' => $request->input('message'),
            'post_id' => $id,
            'user_id' => Auth::user()->id
        ];

        Comment::create($credentials);
        
        return back();
    }
}
