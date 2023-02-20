<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use app\Models\User;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NotifyNelayan;
use Exception;

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
        $notifications = auth()->user()->unreadNotifications;
        return view('Nelayan.Order', ['title' => $title, 'users' => $user, 'notifications' => $notifications]);
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
        try {
            $update = order::where('id_order', $id_order)->update([
                'status' => $confirm
            ]);
        } catch (Exception $e) {
            return dd($e);
        }

        if ($update) {
            if ($confirm == 'accept') {

                return redirect()->back()->with('success', 'Paket Diterima!');
            } else {

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
