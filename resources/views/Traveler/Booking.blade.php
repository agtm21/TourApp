@extends('layouts.main',['title'=> 'Penyewaan'])
@section('penyewaan')

@forelse ($booking as $item)
<div class="container">
    <div class="card">
        <div class="card-header bg-primary">
            <span class="fw-bold">Your Order</span>
        </div>
        <div class="card-body">

            <div class="row justify-content-between">
                <div class="col">
                    <ul style="list-style-type: none">
                        <li>Nama Paket</li>
                        <li>Harga</li>
                        <li>Fasilitas</li>
                        <li>Tanggal</li>
                        <li>Waktu</li>
                        <li>Status</li>
                    </ul>
                </div>
                <div class="col">
                    <ul style="list-style-type: none">
                        <li>: {{ $item->product_name }}</li>
                        <li>: Rp. {{ $item->price }}</li>
                        <li>: {{ $item->product_desc }}</li>
                        <li>: {{ $item->date }}</li>
                        <li>: {{ $item->time }}</li>
                        <li>: <span class="text-danger fw-bold">{{ $item->status }}</span> </li>
                    </ul>
                </div>
                <div class="col">
                    <img src="{{ $item->img_path }}" alt="img_order" class="img-fluid">
                </div>
            </div>
        </div> 
        </div>
    </div>
@empty
<div class="container">
    <div class="card text-center">
        <div class="card-body">
            <p>Saat ini tidak layanan penyewaan yang di proses</p>
            <a href="/homepage" class="btn btn-success">Sewa Sekarang</a>
        </div>
    </div>
</div>
@endforelse
{{-- @foreach ($booking as $item)
    @if (!$item->status == 0)
    <div class="container">
        <div class="card">
            <div class="card-header">
                <span class="fw-bold">Your Order</span>
            </div>
            <div class="card-body">

                <div class="row justify-content-between">
                    <div class="col">
                        <ul style="list-style-type: none">
                            <li>Nama Paket</li>
                            <li>Harga</li>
                            <li>Fasilitas</li>
                            <li>Tanggal</li>
                            <li>Waktu</li>
                            <li>Status</li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul style="list-style-type: none">
                            <li>: {{ $item->product_name }}</li>
                            <li>: Rp. {{ $item->price }}</li>
                            <li>: {{ $item->product_desc }}</li>
                            <li>: {{ $item->date }}</li>
                            <li>: {{ $item->time }}</li>
                            <li>: <span class="text-danger fw-bold">Menunggu Konfirmasi</span> </li>
                        </ul>
                    </div>
                    <div class="col">
                        <img src="{{ $item->img_path }}" alt="img_order" class="img-fluid">
                    </div>
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
        @endforeach --}}
@endsection