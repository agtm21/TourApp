<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminPageController extends Controller
{
    public function index()
    {
        $countuser = User::count();

        return view('Adminlayouts.adminpage');
    }
    public function datauser()
    {
        //cari data di user dan urutkan ke yang paling baru
        $cari = request('cari');
        //paginate(n) = batas data yang ditampilkan sebanyak n
        $users = User::latest()->paginate(6);
        if ($cari) {
            $users->where('username', 'like' . $cari . '%');
        }
        return view('Adminlayouts.DataUser', ['users' => $users]);
    }
    public function create()
    {
        return view('Adminlayouts.create');
    }
    public function store(Request $request)
    {
        // return $request;
        $validateData = $request->validate([
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);
        $validateData['password'] = bcrypt($validateData['password']);
        $cuser = User::create($validateData);
        if ($cuser) {
            return redirect('/datauser')->with('success', 'User Created!');
        } else {
            return back()->with('error', 'Input User Error, Coba Lagi!');
        }
    }
    public function edit($id)
    {
        $users = User::find($id);

        return view('Adminlayouts.edit', compact('users'));
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
        return redirect('/datauser')->with('success', 'Data Has Been Updated!');
    }
    public function destroy(User $id)
    {
        var_dump(User::destroy($id->id));

        return redirect('/datauser')->with('success', 'Data Has Been Deleted!');
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    public function managebooking()
    {
        $order = Order::get();

        return view('Adminlayouts.ManageBooking', ['order' => $order]);
    }
    public function nelayanbook()
    {
        $order = Order::get();
        $user = User::where('role', 'nelayan')->get();
        return view('Adminlayouts.nelayanbook', ['order' => $order, 'user' => $user]);
    }
    public function konfirmasi_order(Request $request)
    {
        $id = $request->get('id_order');
        $newVal = $request->get('nelayanfield');

        Order::where('id_order', $id)
            ->update([
                'nama_nelayan' => $newVal,
                'status' => 0
            ]);

        return redirect('managebooking')->with('success', 'Nelayan Sudah Berhasil Dipilih');
    }
}
