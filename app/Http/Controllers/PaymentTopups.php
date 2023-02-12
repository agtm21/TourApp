<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\payment;
use App\Models\topup;
use App\Models\User;
use App\Models\balance;
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

        // $topups_user = User::find($id_user);
        $topup = topup::where('id_user', $id_user)->latest(); // cari nilai terbaru
        $userbalance = balance::where('id_user', $id_user)->value('id_user');
        $balance = $this->addition($topup->value('amount'), $amount);
        // dd($balance);
        if ($userbalance == $id_user) {
            //do update
            // dd('if untuk update balance jalan');
            $topup = balance::where('id_user', $id_user)->update([ //kalo tidak ada data buat baru, kalo ada data update
                'balance' => $balance
            ]);
            topup::create([
                'id_user' => $id_user,
                'amount' => $amount,
                'currency' => $select,
                'topup_method' => $method
            ]);
        } else {
            //create new
            //using create
            $topup = topup::create([
                'id_user' => $id_user,
                'amount' => $amount,
                'currency' => $select,
                'topup_method' => $method
            ]);
            balance::create([
                'id_user' => $id_user,
                'balance' => $amount
            ]);
            // dd('elsenya yang jalan bro');
        }
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


        //cek jenis currency yang di pakai
        if ($select == 'idr') {
            //langsung masuk ke database
            $topup = $this->insertTopups($id_user, $amount, $select, $method);
        } else {
            //konversi ke idr setelah itu insert ke table
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
