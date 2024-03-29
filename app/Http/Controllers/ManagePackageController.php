<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\booking;

class ManagePackageController extends Controller
{
    public function index()
    {
        $booking = booking::get();
        return view('Adminlayouts.Packages.ManagePackage', compact('booking'));
    }
    public function create()
    {
        return view('Adminlayouts.Packages.AddPackage');
    }
    public function edit($id)
    {
        $booking = booking::find($id);
        // dd($booking);
        return view('Adminlayouts.Packages.edit', compact('booking'));
    }
    public function update($id)
    {
    }
}
