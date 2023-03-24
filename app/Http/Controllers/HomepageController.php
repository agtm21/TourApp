<?php

namespace App\Http\Controllers;

use App\Models\payment;

use App\Models\booking;
use App\Models\Order;
use App\Models\User;
use App\Models\topup;
use App\Models\UserSuggestion;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NotifyNelayan;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function index(Request $request)
    {
        if ($locale = session('locale')) {
            app()->setLocale($locale);
        }
        $id = Auth::id();

        $user = User::find($id);

        $bookedDates = order::pluck('date')->toArray();
        $booking = booking::get();
        return view('Traveler.homepage', [
            'bookings' => $booking,
            'bookdate' => $bookedDates
        ]);
    }

    public function penyewaan()
    {
        if ($locale = session('locale')) {
            app()->setLocale($locale);
        }
        $id = Auth::id();

        $user = User::find($id);
        $bookedDates = order::pluck('date')->toArray();
        $order = $user->Order()->get();
        return view('Traveler.Booking', [
            'booking' => $order,
            'bookdate' => $bookedDates
        ]);
    }

    public function orderpaket($id)
    {
        // dd($id);
        if ($locale = session('locale')) {
            app()->setLocale($locale);
        }
        // dd($bookings);

        $ids = Auth::id();
        $user = User::find($ids);

        $bookings = booking::findOrFail($id);
        $bookedDates = order::pluck('date')->toArray();

        return view('Traveler.ProsesPenyewaan', ['bookings' => $bookings, 'id' => $id, 'bookdate' => $bookedDates]);
    }

    public function langs($locale)
    {
        Session::put('locale', $locale);
        return redirect()->back();
    }


    public function konfirmasipaket(Request $request)
    {
        // ddd($request->file('buktipembayaran')->store('public'));
        $id_user = Auth::id();
        $user = new User();
        $admin = $user->where('role', 'admin')->get();
        $username = $user->where('role', 'admin')->first();

        $order = new Order();


        $order->user_id = $request->input('id_user');
        $order->img_path = $request->input('img_path');
        $order->product_name = $request->input('product_name');
        $order->price = $request->input('price');
        $order->date = $request->input('date');
        $order->time = $request->input('time');
        $order->place = $request->input('price');
        $order->product_desc = $request->input('product_desc');
        $order->status = 'wait';
        // $order->image = $request->file('buktipembayaran')->store('buktipembayaran');
        $order->save();


        if ($order) {
            $msg = [
                'id_order' => $order->id_order,
                'subject' => 'Pesanan Masuk',
                'greeting' => 'Hi ' . $username->username,
                'body' => 'Ada Orderan Masuk, segera cek website anda, Silakan hubungi nomor Hp Wisatawan ' . auth()->user()->phone,
                'link' => 'Pilih Nelayan',
                'url' => 'http://localhost:3000',
                'date' => 'Tanggal Pesanan: ' . $request->input('date'),
                'time' => 'Waktu Pesanan: ' . $request->input('time')
            ];
            Notification::send($admin, new NotifyNelayan($msg));
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
        $bookedDates = order::pluck('date')->toArray();
        $user = User::find($id);

        $history = $user->order()->get();

        return view('Traveler.History', ['history' => $history, 'bookdate' => $bookedDates]);
    }
    public function about()
    {

        $id = Auth::id();
        $user = User::find($id);

        $history = $user->order();
        $bookedDates = order::pluck('date')->toArray();
        return view('about', ['bookdate' => $bookedDates]);
    }
    public function kritik(Request $request)
    {
        $id = Auth::id();
        $suggestion = new UserSuggestion();
        $suggestion->user_id = $id;
        $suggestion->suggestion = $request->input('suggestion');
        $suggestion->save();
        if ($suggestion) {
            return redirect('/about')->with('success', 'Kritik dan Saran Berhasil Disimpan');
        } else {
            return redirect('/about')->with('error', 'Kritik dan Saran Tidak Berhasil Disimpan');
        }
    }
    public function NotificationOrder()
    {
        $id = Auth::id();
        $user = User::find($id);
        $bookedDates = order::pluck('date')->toArray();
        $notifications = auth()->user()->unreadNotifications;
        return view('Traveler.NotificationOrder', [
            'notifications' => $notifications,
            'bookdate' => $bookedDates
        ]);
    }
    public function markAsReads($id)
    {
        $auth = Auth::user();
        $notif = $auth->notifications->where('id', $id)->first();
        if ($notif) {
            $notif->markAsRead();
        }

        return redirect()->back();
    }
    public function BuktiPembayaran(Request $request)
    {
        // dd($request->get('order_id'));
        $order = Order::find($request->get('order_id'));
        $order->image =  $request->file('bukti_pembayaran')->store('bukti_pembayaran');
        $order->update();
        if ($order) {

            return redirect()->back()->with('success', 'Bukti Pembayaran berhasil diupload');
        } else {
            return redirect()->back()->with('error', 'Bukti Pembayaran tidak berhasil diupload');
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
