<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use Illuminate\Support\Facades\Auth;

class HomepagenelController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $user = User::get();
        return view('Nelayan.Dashboard', ['title' => $title, 'users' => $user]);
    }
    public function Order()
    {
        $title = 'Order';
        $user = User::get();
        return view('Nelayan.Order', ['title' => $title, 'users' => $user]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
