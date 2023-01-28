@extends('layouts.main', ['title'=>'Penyewaan'])
@section('container')

@foreach($order as $orderitem)
{{-- cek status order berdasarkan id_user --}}
@if($orderitem->status == 1) 
    <div class="container">
       <div class="card">
        <div class="card-header">
            Your Order
        </div>
        <div class="card-body">
            <div class="row justify-content-center align-items-center g-2">
                <div class="col col-md-2">
                    <ul style="list-style-type: none">
                        <li>Nama Paket</li>
                        <li>Harga</li>
                        <li>Fasilitas</li>
                        <li>Tanggal</li>
                        <li>Waktu</li>
                    </ul>
                </div>
                <div class="col col-md-7">
                    <ul style="list-style-type: none">
                        <li>: {{ $orderitem->product_name }}</li>
                        <li>: {{ $orderitem->price }}</li>
                        <li>: {{ $orderitem->product_desc }}</li>
                        <li>: {{ $orderitem->date }}</li>
                        <li>: {{ $orderitem->time }}</li>
                    </ul>
                </div>
                <div class="col">
                    <img src="{{ $orderitem->img_path }}" alt="img-order" class="img-fluid" style="width:300px">
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
@endforeach
@endsection