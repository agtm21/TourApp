<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\topup;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function admin()
    {
        $id = Auth::id(); //ambil id user yang sedang login
        $balance = topup::where('id_user', $id)->first();
        return view('Adminlayouts.Profile', ['users' => request()->user(), 'balance' => $balance]);
    }
    public function traveler()
    {
        $id = Auth::id(); //ambil id user yang sedang login
        $balance = topup::where('id_user', $id)->first();
        return view('Traveler.Profile', ['users' => request()->user()]);
    }
    public function nelayan()
    {
        $id = Auth::id(); //ambil id user yang sedang login
        $balance = topup::where('id_user', $id)->first();
        return view('Nelayan.Profile', ['users' => request()->user()]);
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
