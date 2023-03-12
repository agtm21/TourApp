<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\balance;
use App\Models\topup;
use Illuminate\Support\Facades\Auth;

class UserProfileController extends Controller
{
    public function admin()
    {


        return view('Adminlayouts.Profile', ['users' => request()->user()]);
    }
    public function traveler()
    {
        $id = Auth::id(); //ambil id user yang sedang login
        // $balance = balance::where('id_user', $id)->value('balance');
        return view('Traveler.Profile', ['users' => request()->user()]);
    }
    public function nelayan()
    {

        return view('Nelayan.Profile', ['users' => request()->user()]);
    }
    public function update(Request $request)
    {

        // return ddd($request->file('image')->store('user-profile'));
        // dd($request->get('user_id'));
        // $request->validate([
        //     'username' => 'required',
        //     'email' => 'required',
        //     'password' => 'required',
        //     'user_profile' => 'required|image|size:5048|mimetypes:jpg/png'
        // ]);

        $usr = User::find($request->get('user_id'));
        if (!$usr->image) {
            $usr->image = $request->file('user_profile')->store('user-profile');
        }
        $usr->username =  $request->get('username');
        $usr->email = $request->get('email');
        $usr->password = $request->get('password');

        $usr->phone = $request->get('phone');
        $usr['password'] = bcrypt($usr['password']);
        $usr->update();
        if ($usr) {

            return redirect()->back()->with('success', 'Data Has Been Updated!');
        } else {
            return redirect()->back()->with('error', 'Update Data Fail');
        }
    }
}
