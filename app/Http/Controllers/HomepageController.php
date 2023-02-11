<?php

namespace App\Http\Controllers;

use App\Models\payment;

use App\Models\booking;
use App\Models\Order;
use App\Models\User;
use App\Models\topup;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        if ($locale = session('locale')) {
            app()->setLocale($locale);
        }
        $id = Auth::id();


        $balance = topup::where('id_user', $id)->sum('amount');

        if ($balance == NULL) {
            $balance = 0;
        }
        // $balance = topup::where('id_user', $id)->sum('amount');
        $booking = booking::latest()->paginate(9);
        return view('Traveler.homepage', [
            'bookings' => $booking,
            'balance' => $balance
        ]);
    }

    public function penyewaan()
    {
        if ($locale = session('locale')) {
            app()->setLocale($locale);
        }
        $id = Auth::id();

        $balance = topup::where('id_user', $id)->sum('amount');

        if ($balance == NULL) {
            $balance = 0;
        }
        $order = Order::where('id_user', $id)->where('status', 1)->get(); //cari paket berdasarkan id user
        return view('Traveler.Booking', [
            'booking' => $order,
            'balance' => $balance
        ]);
    }

    public function orderpaket($id)
    {
        // dd($id);
        if ($locale = session('locale')) {
            app()->setLocale($locale);
        }
        // dd($bookings);

        $id = Auth::id();
        $balance = topup::where('id_user', $id)->sum('amount');
        if ($balance == NULL) {
            $balance = 0;
        }
        $bookings = booking::findOrFail($id);


        return view('Traveler.ProsesPenyewaan', ['bookings' => $bookings, 'id' => $id, 'balance' => $balance]);
    }
    // public function paket(Request $request)
    // {
    //     $validation = $request->validate([
    //         'id_product' => 'id_product',
    //         'product_name' => 'product_name',
    //         'uuid_user' => 'uuid_user',
    //         'id_name' => 'username',
    //     ]);
    //     // DB::create($validation);
    //     // return redirect('Traveler.homepage')->with('success', 'Paket berhasil dipesan! Cek Penyewaan untuk melihat Paketmu');
    // }
    public function langs($locale)
    {
        Session::put('locale', $locale);
        return redirect()->back();
    }


    public function konfirmasipaket(Request $request)
    {

        $confirm = Order::create([
            'id_user' => $request->input('id_user'),
            'img_path' => $request->input('img_path'),
            'product_name' => $request->input('product_name'),
            'price' => $request->input('price'),
            'date' => $request->input('date'),
            'time' => $request->input('time'),
            'place' => $request->input('place'),
            'product_desc' => $request->input('product_desc'),
            'method' => $request->input('method'),
            'status' => 1
        ]);
        // dd($confirm);
        if ($confirm) {
            return redirect('homepage')->with('success', 'Paket Berhasil Dipesan!');
        } else {
            return redirect()->back()->with('error', 'Paket gagal Dipesan!');
        }
    }
    public function history()
    {
        if ($locale = session('locale')) {
            app()->setLocale($locale);
        }
        $id = Auth::id();
        $history = Order::where('id_user', $id)->get();

        $balance = topup::where('id_user', $id)->sum('amount');
        if ($balance == NULL) {
            $balance = 0;
        }
        // $balance = topup::where('id_user', $id)->sum('amount');
        return view('Traveler.History', ['history' => $history, 'balance' => $balance]);
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
