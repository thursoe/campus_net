<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('register');
    }

    public function register(Request $request)
    {
        $credentials = $request->validate([
            'name' => 'required',
            'email' => 'required',
            'password' => 'required|min:8',
            'password_confirm' => 'required|same:password',
            'department_id' => 'required'
        ]);

        $credentials['password'] = Hash::make($request->password);

        User::create($credentials);

        return redirect('login');
    }
}
