<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Http\Controllers\Controller;
use App\Models\booking;
use Illuminate\Support\Str;
use App\Notifications\NotifyNelayan;
use Illuminate\Support\Facades\Auth;

class AdminPageController extends Controller
{
    public function index()
    {
        $countuser = User::count();
        $ordercount = Order::where('status', 1)->count();
        $doneorder = Order::where('status', 0)->count();
        return view('Adminlayouts.adminpage', ['order' => $ordercount, 'doneorder' => $doneorder]);
    }
    public function datauser()
    {
        //cari data di user dan urutkan ke yang paling baru
        $cari = request('cari');
        //paginate(n) = batas data yang ditampilkan sebanyak n
        $traveler = User::where('role', 'traveler')->paginate(3);
        $nelayan = User::where('role', 'nelayan')->paginate(3);
        if ($cari) {
            $traveler->where('username', 'like', '%' . $cari . '%');
        }
        return view('Adminlayouts.DataUser', ['traveler' => $traveler, 'nelayan' => $nelayan]);
    }
    public function create()
    {
        return view('Adminlayouts.create');
    }
    public function store(Request $request)
    {
        $uuid = Str::uuid();
        // return $request;
        $validateData = $request->validate([
            'uuid',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required'
        ]);
        $validateData['uuid'] = $uuid;
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
        $iduser = $request->get('id_user');
        $newVal = $request->get('nelayanfield');
        $trvl = User::where('id', $iduser)->first();
        Order::where('id_order', $id)
            ->update([
                'nama_nelayan' => $newVal,
                'status' => 0
            ]);
        //cari username nelayan
        $user = User::where('username', $newVal)->first();
        //pesan yang akan di kirim
        // dd($trvl->username, $iduser);
        $msg = [
            'nama' => $newVal,
            'message' => 'Anda Mendapatkan Pesanan! dari',
            'pemesan' => $trvl->username,
            'date' => 'date',
            'time' => 'time'
        ];
        Notification::send($user, new NotifyNelayan($msg)); //send notif ke spesifik user
        return redirect('managebooking')->with('success', 'Nelayan Sudah Berhasil Dipilih');
    }
}
