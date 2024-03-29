<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('signin');
    }
    public function grab_data(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required|min:6|max:255'
        ]);
        // Cek login user dengan role
        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            $request->session()->flash('video', 'Welcome');
            if ($user->role == 'admin') {
                $request->session()->regenerate();
                return redirect()->intended('/adminpage');
            } elseif ($user->role == 'traveler') {
                $request->session()->regenerate();
                return redirect()->intended('/homepage');
            } elseif ($user->role == 'nelayan') {
                return redirect()->intended('/nelayan/homepage');
            }
            return redirect()->intended('/');
        }
        return back()->with('loginerror', 'Login Failed!');
    }
    public function langs($locale)
    {
        Session::put('locale', $locale);
        return redirect()->back();
    }
}
