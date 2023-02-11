<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payment;
use App\Models\topup;
use App\Models\User;
use App\Models\topup_detail;
use Exception;
use Illuminate\Support\Facades\Log;

use Illuminate\Support\Facades\Auth;

class PaymentTopups extends Controller
{
    public function Topups()
    {
        if ($locale = session('locale')) {
            app()->setLocale($locale);
        }
        $id = Auth::id();
        $balance = topup::where('id_user', $id)->sum('amount');
        // dd($balance);
        return view('Traveler.topup', ['balance' => $balance]);
    }
    //fungsi insert data
    private function insertTopups($id_user, $amount, $select, $method)
    {

        $topups_user = User::find($id_user);
        // $topups = new topup(); //aliasing
        // //topup table
        // $topups->id_user = $id_user;
        // $topups->amount = $amount;
        // $topups->currency = $select;
        // $topups->topup_method = $method;

        // $topups_user->topup()->save($topups); // insert data ke tabel topup


        //using create

        $topup = topup::create([
            'id_user' => $id_user,
            'amount' => $amount,
            'currency' => $select,
            'topup_method' => $method
        ]);
        // dd($topup);

    }
    private function converstion($amount)
    {
        return $amount * 15000; //asumsi 1 usd = 15000 idr
    }
    private function addition($amount, $newval)
    {
        return $amount + $newval;
    }
    public function prosesTopup(Request $request)
    {
        $id_user = Auth::id(); //id user yang login
        //get input
        $amount = $request->input('amount');
        $select = $request->input('select');
        $method = $request->input('method');


        //kondisi
        if ($select == 'idr') {

            $topup = $this->insertTopups($id_user, $amount, $select, $method);
        } else {

            $usdtoidr = $this->converstion($amount);
            $topup = $this->insertTopups($id_user, $usdtoidr, $select, $method);
        }
        if (!$topup) {

            return redirect('homepage')->with('success', 'Topup Berhasil!');
        } else {

            return redirect()->back()->with('error', 'Topup Gagal!');
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
