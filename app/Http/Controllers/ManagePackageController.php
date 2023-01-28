<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ManagePackageController extends Controller
{
    public function index()
    {
        return view('Adminlayouts.Packages.ManagePackage');
    }
    public function create()
    {
        return view('Adminlayouts.Packages.AddPackage');
    }
    public function edit()
    {
        return view('Adminlayouts.Packages.edit');
    }
}
