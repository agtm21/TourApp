<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Order;
use App\Models\topup;
use App\Models\balance;
use App\Models\booking;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Notifications\NotifyNelayan;
use Illuminate\Database\QueryException;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class AdminPageController extends Controller
{
    public function index()
    {
        $countuser = User::count();
        $ordercount = Order::where('status', 1)->count();
        $doneorder = Order::where('status', 0)->count();
        $bookingcount = booking::count();
        return view('Adminlayouts.adminpage', ['countuser' => $countuser, 'order' => $ordercount, 'doneorder' => $doneorder, 'booking' => $bookingcount]);
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
        $users = User::where('uuid', $id)->first();
        if (!$users) {
            abort(404);
        }

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

        return view('Adminlayouts.Manage.ManageBooking', ['order' => $order]);
    }
    public function nelayanbook($id)
    {
        $order = Order::find($id);
        $user = User::where('role', 'nelayan')->get();
        return view('Adminlayouts.nelayanbook', ['order' => $order, 'user' => $user]);
    }
    public function konfirmasi_order(Request $request)
    {
        //variables
        $id = $request->get('id_order'); //id order
        $iduser = $request->get('id_user'); //id user
        $newVal = $request->get('nelayanfield'); //nama nelayan (input hidden)
        $time = $request->get('time'); //time
        $date = $request->get('date'); //date

        $user = User::find($iduser);
        // $order = Order::find($id);
        $price = $user->order()->value('price'); //get price from order with certain user
        $balance = $user->balance()->value('balance'); //get user balance
        $user->balance()->update([
            'balance' => $balance - $price //substracting price with user balance
        ]);

        // update status pesanan
        try {
            Order::where('id', $id)->update([
                'nama_nelayan' => $newVal,
                'status' => 'process'
            ]);
        } catch (QueryException $e) {
            return $e;
        }
        //cari username nelayan

        $nelayan = User::where('username', $newVal)->get();

        //pesan yang akan di kirim
        $msg = [
            'id_order' => $id, //id_order
            'subject' => 'Pesanan Masuk',
            'greeting' => 'Hi ' . $newVal . '!',
            'body' => 'Anda Mendapatkan Pesanan dari Admin segera cek website anda!',
            'date' => 'Tanggal Pesanan:' . $date,
            'time' => 'Waktu Pesanan:' . $time,
            'link' => 'Cek Pesanan',
            'url' => 'http://localhost:3000/'
        ];
        // $nelayan->notify(new NotifyNelayan($msg));
        Notification::send($nelayan, new NotifyNelayan($msg)); //send notif ke spesifik user    

        return redirect('managebooking')->with('success', 'Nelayan Sudah Berhasil Dipilih');
    }
    public function ManageNelayanOrder()
    {
        $nelayan = Order::select('nama_nelayan', DB::raw('count(*) as count'))
            ->groupBy('nama_nelayan')
            ->having('count', '>', 0)
            ->get();

        // ddd($nelayan);
        return view('Adminlayouts.Manage.ManageNelayanOrder', [
            'nelayan' => $nelayan
        ]);
    }
    public function ManagePembayaran()
    {
        $order = Order::get();

        return view('Adminlayouts.Manage.ManagePembayaran', [
            'order' => $order
        ]);
    }
}
