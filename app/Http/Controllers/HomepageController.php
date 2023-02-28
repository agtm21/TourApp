<?php

namespace App\Http\Controllers;

use App\Models\payment;

use App\Models\booking;
use App\Models\balance;
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
        $balance = $user->balance;

        $balance = $this->BalanceCheck($balance);

        $booking = booking::latest()->paginate(9);
        return view('Traveler.homepage', [
            'bookings' => $booking,
            'balance' => $balance
        ]);
    }
    private function BalanceCheck($balance)
    {
        if ($balance == NULL) {
            $balance = 0;
        } else {
            $balance = $balance->value('balance');
        }
        return $balance;
    }
    public function penyewaan()
    {
        if ($locale = session('locale')) {
            app()->setLocale($locale);
        }
        $id = Auth::id();

        $user = User::find($id);
        $balance = $user->balance;

        $balance = $this->BalanceCheck($balance);
        $order = $user->Order()->get();
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

        $ids = Auth::id();
        $user = User::find($ids);
        $balance = $user->balance;
        $balance = $this->BalanceCheck($balance);
        $bookings = booking::findOrFail($id);


        return view('Traveler.ProsesPenyewaan', ['bookings' => $bookings, 'id' => $id, 'balance' => $balance]);
    }

    public function langs($locale)
    {
        Session::put('locale', $locale);
        return redirect()->back();
    }


    public function konfirmasipaket(Request $request)
    {
        $id_user = Auth::id();
        $user = new User();
        $admin = $user->where('role', 'admin')->get();
        $username = $user->where('role', 'admin')->first();
        $balance = $user->find($id_user)->balance;
        $order = new Order();
        $price = $request->input('price');


        if ($balance < $price) {
            return redirect()->back()->with('error', 'Balance Tidak Cukup! Disarankan menggunakan Tunai atau Topup!');
        } else {

            $order->user_id = $request->input('id_user');
            $order->img_path = $request->input('img_path');
            $order->product_name = $request->input('product_name');
            $order->price = $request->input('price');
            $order->date = $request->input('date');
            $order->time = $request->input('time');
            $order->place = $price;
            $order->product_desc = $request->input('product_desc');
            $order->method = $request->input('method');
            $order->status = 'wait';
            $order->save();

            if ($order) {
                $msg = [
                    'id_order' => $order->id_order,
                    'subject' => 'Pesanan Masuk',
                    'greeting' => 'Hi ' . $username->username,
                    'body' => 'Ada Orderan Masuk, segera cek website anda',
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
    }
    public function history()
    {
        if ($locale = session('locale')) {
            app()->setLocale($locale);
        }
        $id = Auth::id();

        $user = User::find($id);

        $history = $user->order()->get();
        $balance = $user->balance;

        $balance = $this->BalanceCheck($balance);
        return view('Traveler.History', ['history' => $history, 'balance' => $balance]);
    }
    public function about()
    {

        $id = Auth::id();
        $user = User::find($id);
        $balance = $user->balance;

        $balance = $this->BalanceCheck($balance);
        $history = $user->order();

        return view('about', ['balance' => $balance]);
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
        $balance = $user->balance()->value('balance');
        $notifications = auth()->user()->unreadNotifications;
        return view('Traveler.NotificationOrder', [
            'balance' => $balance,
            'notifications' => $notifications
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
    
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
