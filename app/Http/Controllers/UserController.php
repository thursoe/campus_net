<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\File;

class UserController extends Controller
{
    public function index()
    {
        return view('users.index');
    }

    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', ['user' => $user]);
    }

    public function showEditForm()
    {
        return view('users.edit');
    }

    public function update(Request $request)
    {

        $file = $request->file('image');

        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'image' => 'mimes:jpg,png,jpeg'
        ]);

        $credentials = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
        ];

        if ($request->hasFile('image')) {
            $filename = uniqid() . '.' . $file->extension();
            $file->storeAs('public/users/images', $filename);
            $credentials['image'] = $filename;
        }

        DB::table('users')->where('id', Auth::user()->id)->update($credentials);
        return back();
    }
}
