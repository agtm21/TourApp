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
        $user = User::find($id);
        $balance = $user->balance;;
        if ($balance == NULL) {
            $balance = 0;
        } else {
            $balance = $balance->value('balance');
        }
        // dd($balance);
        return view('Traveler.topup', ['balance' => $balance]);
    }
    //fungsi insert data
    private function insertTopups($id_user, $amount, $select, $method)
    {


        $user = User::find($id_user);
        $topup = $user->topup()->latest();
        
        if ($topup == NULL) {
            $balance = $this->addition($topup, $amount);
        } else {

            $balance = $this->addition($topup->value('amount'), $amount);
        }
        if ($user->balance) {

            try {

                //update table balance kolom balance
                $balance_table = new balance();
                $balance_table = $balance;

                $user->balance()->update([
                    'balance' => $balance_table,
                ]);

                //insert data topup
                $topup_insert = new topup();
                $topup_insert->user_id = $id_user;
                $topup_insert->amount = $amount;
                $topup_insert->currency = $select;
                $topup_insert->topup_method = $method;
                $topup_insert->save(); //simpan perubahan
            } catch (\Exception $e) {
                dd($e);
            }
            // topup::create([
            //     'id_user' => $id_user,
            //     'amount' => $amount,
            //     'currency' => $select,
            //     'topup_method' => $method
            // ]);
        } else {
            //create new
            //using create
            // $topup = topup::create([
            //     'id_user' => $id_user,
            //     'amount' => $amount,
            //     'currency' => $select,
            //     'topup_method' => $method
            // ]);
            try {
                $topup_insert = new topup();
                $topup_insert->user_id = $id_user;
                $topup_insert->amount = $amount;
                $topup_insert->currency = $select;
                $topup_insert->topup_method = $method;
                $topup_insert->save(); //simpan perubahan

                $balance_insert = new balance();
                $balance_insert->user_id = $id_user;
                $balance_insert->balance = $amount;
                $balance_insert->save();
            } catch (\Exception $e) {
                dd($e);
            }
            // balance::create([
            //     'id_user' => $id_user,
            //     'balance' => $amount
            // ]);
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
