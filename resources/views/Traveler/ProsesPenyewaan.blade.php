@extends('layouts.main',['title'=>'Konfirmasi Pesanan'])
@section('packagelist')

<form action="/confirm" method="POST">
    @csrf
<div class="container mb-4">
    <div class="card">
        <div class="card-header">
            Your Order
        </div>
        <div class="card-body">
            <div class="row justify-content-center align-items-center g-2">
                <input type="hidden" value="{{ auth()->user()->id }}" name="id_user">
                <input type="hidden" value="{{ $bookings->product_name}}" name="product_name">
                <input type="hidden" value="{{ $bookings->price }}" name="price">
                <input type="hidden" value="{{ $bookings->product_desc}}" name="product_desc">
                <input type="hidden" value="{{ $bookings->date}}" name="date">
                <input type="hidden" value="{{  $bookings->time }}" name="time">
                <input type="hidden" value="{{$bookings->img_path  }}" name="img_path">
                
                <div class="col col-md-2">
                    <ul style="list-style-type: none;">
                        <li>Nama Paket</li>
                        <li>Price</li>
                        <li>Fasilitas</li>
                        <li>Tanggal Berlayar</li>
                        <li>Jam Berlayar</li>
                    </ul>
                </div>
                <div class="col">
                    <ul style="list-style-type: none;">
                        <li>: {{ $bookings->product_name }}</li>
                        <li>: {{ $bookings->price }}</li>
                        <li>: {{ $bookings->product_desc }}</li>
                        <li>: {{ $bookings->date }}</li>
                        <li>: {{ $bookings->time }}</li>
                    </ul>
                </div>
                <div class="col">
                    <span>
                        {{ $bookings->img_path }}
                    </span>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-info">Konfirmasi</button>
                </div>
            </div>
        </div>
    </div>
</div>
</form>
@endsection
