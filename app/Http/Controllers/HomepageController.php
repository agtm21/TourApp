<?php

namespace App\Http\Controllers;

use App\Models\booking;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomepageController extends Controller
{
    public function index()
    {
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
        $paket = 1; //menentukan apakah ada paket yang dipesan atau tidak
        return view('Traveler.Penyewaan', ['paket' => $paket]);
    }
    public function konfirmasipaket($id)
    {
        // dd($id);
        $bookings = booking::findOrFail($id);
        // dd($bookings);
        return view('Traveler.ProsesPenyewaan', ['bookings' => $bookings, 'id' => $id]);
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }
}
