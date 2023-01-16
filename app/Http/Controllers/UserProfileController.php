<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserProfileController extends Controller
{
    public function index()
    {

        return view('Profile', ['users' => request()->user()]);
    }
    public function update(Request $request, $id)
    {

        $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        $usr = User::find($id);
        $usr->username =  $request->get('username');
        $usr->email = $request->get('email');
        $usr->password = $request->get('password');
        $usr['password'] = bcrypt($usr['password']);
        $usr->save();
        return redirect('/profile')->with('success', 'Data Has Been Updated!');
    }
}
