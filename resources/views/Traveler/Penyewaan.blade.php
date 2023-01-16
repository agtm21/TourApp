@extends('layouts.main', ['title'=>'Penyewaan'])
@section('container')

@if($paket)
    <div class="container">
       <div class="card">
        <div class="card-header">
            Daftar Paket
        </div>
        <div class="card-body">
            <div class="card-title d-flex justify-content-between">
                <p>Nama Paket</p>
                <p>Status: On Process</p>
            </div>
            <div class="card-text d-flex justify-content-between">
                Detail Pesanan
                <a href="#" class="btn btn-danger">Batalkan</a>
            </div>
            
        </div>
       </div>
    </div>
@else
    <div class="container">
        <div class="card text-center">
            <div class="card-body">
                <p>Saat ini tidak layanan penyewaan yang di proses</p>
                <a href="/homepage" class="btn btn-success">Sewa Sekarang</a>
            </div>
        </div>
    </div>
@endif
@endsection