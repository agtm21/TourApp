@extends('layouts.main',['title'=>'Konfirmasi Pesanan'])
@section('packagelist')

<form action="/prosespenyewaan" method="POST">
    @csrf
<div class="container mb-4">
    <div class="card">
        <div class="card-body d-flex justify-content-between">
            <div>
                <h2>{{ $bookings->product_name }}</h2>
                <h3 class="text-danger">Rp. {{ $bookings->price }}</h3>
                <p>{{ $bookings->product_desc }}</p>
                <p>Waktu</p>
                <a class="btn btn-success" type="submit">Konfirmasi</a>
            </div>
            <div class="img-thumbnail rounded">
                <img src="{{ $bookings->img_path }}" class=" img-fluid" alt="gambar-paket">
            </div>
        </div>
    </div>
</div>
</form>
@endsection
