<?php

namespace App\Http\Controllers;

use App\Models\booking;
use App\Models\Order;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function index()
    {
        if ($locale = session('locale')) {
            app()->setLocale($locale);
        }
        $users = User::get();
        $booking = booking::latest()->paginate(9);
        return view('Traveler.homepage', [
            'bookings' => $booking
        ]);
    }
    public function indexnel()
    {
        return view('/homepagenel');
    }
    public function penyewaan()
    {
        $auth = Auth::id(); //mendapatkan id user yang login saat ini
        $order = Order::where('id_user', $auth)->get(); //cari paket berdasarkan id user
        //menentukan apakah ada paket yang dipesan atau tidak
        // dd($order);
        return view('Traveler.Penyewaan', [
            'order' => $order
        ]);
    }
    public function orderpaket($id)
    {
        // dd($id);
        $bookings = booking::findOrFail($id);
        // dd($bookings);

        return view('Traveler.ProsesPenyewaan', ['bookings' => $bookings, 'id' => $id]);
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
    public function topup()
    {
        return view('Traveler.topup');
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
            'product_desc' => $request->input('product_desc'),
            'status' => 1
        ]);
        // dd($confirm);
        if ($confirm) {
            return redirect('homepage')->with('success', 'Paket Berhasil Dipesan! Silakan pergi ke <a href="/penyewaan">Penyewaan</a> untuk melihat pesanan');
        } else {
            return redirect()->back()->with('error', 'Paket gagal Dipesan!');
        }
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
