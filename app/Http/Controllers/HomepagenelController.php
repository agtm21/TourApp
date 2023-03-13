<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NotifyNelayan;
use Exception;
use Illuminate\Support\Facades\Notification;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Database\QueryException;

class HomepagenelController extends Controller
{
    public function index()
    {
        $title = 'Dashboard';
        $user = User::get();
        $order = order::where('status', 'process')->count();
        $acc = order::where('status', 'accept')->count();
        $dec = order::where('status', 'decline')->count();
        return view('Nelayan.Dashboard', [
            'title' => $title,
            'users' => $user,
            'order' => $order,
            'accept' => $acc,
            'decline' => $dec
        ]);
    }
    public function Order()
    {
        $title = 'Order';
        $user = User::get();
        $order = Order::first();
        // dd(Request()->get('idorder'));
        $notifications = DatabaseNotification::where('notifiable_id', auth()->user()->id)->get();
        return view('Nelayan.Order', [
            'title' => $title,
            'users' => $user,
            'notifications' => $notifications,
            'order' => $order
        ]);
    }
    public function markAsRead(Request $request, $id)
    {
        auth()->user()->unreadNotifications->where('id', $id)->markAsRead();
        return redirect()->back();
    }
    public function ConfirmOrder(Request $request)
    {

        $id_order = $request->get('idorder');

        $confirm = $request->get('status');
        $order = Order::find($id_order); //get order data
        $wisatawan = User::find($order->user->id); //get user
        $admin = User::where('role', 'admin')->first();
        $nelayan = Auth::user()->username;

        try {
            $update = Order::where('id', $id_order)->update([
                'status' => $confirm
            ]);
        } catch (QueryException $e) {
            return response()->json(['error' => 'Gagal Mengupdate Data!'], 500);
        }

        if ($update) {
            if ($confirm == 'accept') {

                $msg = [
                    'id_order' => $id_order,
                    'subject' =>  'Pesanan Diterima!',
                    'greeting' => 'Hi ' . $wisatawan->username . '!',
                    'body' => 'Orderean telah diterima oleh ' . $nelayan . ' Anda tinggal menunggu jadwal keberangkatan. Berikut Nomor Nelayan ' . auth()->user()->phone,
                    'date' => 'Tanggal Pesanan:' . $order->date,
                    'time' => 'Waktu Pesanan:' . $order->time,
                    'link' => 'Login',
                    'url' => 'http://localhost:3000'
                ];
                $msgadmin = [
                    'id_order' => $id_order,
                    'subject' =>  'Pesanan Diterima!',
                    'greeting' => 'Hi ' . $admin->username . '!',
                    'body' => 'Pesanan Sudah diterima',
                    'date' => 'Tanggal Pesanan:' . $order->date,
                    'time' => 'Waktu Pesanan:' . $order->time,
                    'link' => 'Login',
                    'url' => 'http://localhost:3000'
                ];
                Notification::send($wisatawan, new NotifyNelayan($msg));
                Notification::send($admin, new NotifyNelayan($msgadmin));
                return redirect()->back()->with('success', 'Paket Diterima!');
            } else {
                $msgadmin = [
                    'id_order' => $id_order,
                    'subject' =>  'Pesanan Diterima!',
                    'greeting' => 'Hi ' . $wisatawan->username . '!',
                    'body' => 'Pesanan ditolak Oleh ' . $nelayan,
                    'date' => 'Tanggal Pesanan:' . $order->date,
                    'time' => 'Waktu Pesanan:' . $order->time,
                    'link' => 'Login',
                    'url' => 'http://localhost:3000'
                ];
                Notification::send($admin, new NotifyNelayan($msgadmin));
                return redirect()->back()->with('success', 'Paket Ditolak!');
            }
        } else {
            return redirect()->back()->with('error', 'Terjadi Error');
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
