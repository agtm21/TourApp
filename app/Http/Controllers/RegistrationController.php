<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    public function index_signup()
    {
        return view('signup');
    }

    public function index_nel()
    {
        return view('signupnel');
    }
    public function store_data(Request $request)
    {
        $validateData = $request->validate([
            'username' => ['required', 'min:8', 'max:255', 'unique:users'],
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|max:255',
            'role' => 'required'
        ]);
        // Cara Kedua menggunakan HASH, tapi sama saja karena sama - sama menggunakan bcrypt
        $validateData['password'] = bcrypt($validateData['password']);
        User::create($validateData);
        return redirect('/login')->with('success', 'Registration Success!');
    }
}
