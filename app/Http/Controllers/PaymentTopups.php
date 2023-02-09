<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payment;
use App\Models\topup;
use Illuminate\Support\Facades\Auth;

class PaymentTopups extends Controller
{
    public function Topups()
    {
        if ($locale = session('locale')) {
            app()->setLocale($locale);
        }
        $id = Auth::id();
        $balance = topup::where('id_user', $id)->first();
        return view('Traveler.topup', ['balance' => $balance]);
    }
    public function prosesTopup(Request $request)
    {
        $user = Auth::id();
        $check = topup::where('id_user', $user)->first();
        $amount = $request->input('amount');
        $select = $request->input('select');
        $method = $request->input('method');
        $topup = new topup;
        if ($check->amount != 0 && $check->currency == 'IDR') {
            $topup->amount = $check->amount + $amount;
        } else {

            $topup->id_user = $user;
            $topup->amount = $amount;
            $topup->currency = $select;
            $topup->topup_method = $method;
        }

        $topup->save();

        if ($topup) {

            return redirect('homepage')->with('success', 'Topup Berhasil!');
        } else {
            return redirect()->back() - with('error', 'Topup Gagal!');
        }
    }
    // payment
    public function processPayment(Request $request)
    {
        $payment = payment::create([
            'trancation_id' => $request->transaction_id,
            'amount' => $request->amount,
            'payment_method' => $request->payment_method,
            'payment_status' => $request->payment_status,
        ]);
        return redirect('/homepage')->with('success', 'Pembayaran Berhasil');
    }
}
