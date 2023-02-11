@extends('layouts.main',['title'=>'Konfirmasi Pesanan'])
@section('prosespenyewaan')

<form action="/confirm" method="POST">
    @csrf
<div class="container mb-4">
    <div class="card">
        <div class="card-header bg-primary">
           <span class="fw-bold">Your Order</span>
        </div>
        <div class="card-body">
            <div class="row justify-content-center align-items-center g-2">
                <input type="hidden" value="{{ auth()->user()->id }}" name="id_user">
                <input type="hidden" value="{{ $bookings->product_name}}" name="product_name">
                <input type="hidden" value="{{ $bookings->price }}" name="price">
                <input type="hidden" value="{{ $bookings->product_desc}}" name="product_desc">
                <input type="hidden" value="{{ $bookings->date}}" name="date">
                <input type="hidden" value="{{$bookings->time }}" name="time">
                <input type="hidden" value="{{$bookings->place }}" name="place">
                <input type="hidden" value="{{$bookings->img_path  }}" name="img_path">
                <div class="col">
                    
                    <table class="table table-borderless">
                        <tr>
    
                            <td>Nama Paket</td>
                            <td>:</td>
                            <td> {{ $bookings->product_name }}</td>
                            
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td>:</td>
                            <td> {{ $bookings->price }}</td>
                            
                        </tr>
                        <tr>
                            <td>Fasilitas</td>
                            <td>:</td>
                            <td> {{ $bookings->product_desc }}</td>
                            
                        </tr>
                        <tr>
                            <td>Tanggal Berlayar</td>
                            <td>:</td>
                            <td> {{ $bookings->date }}</td>
                            
                        </tr>
                        <tr>
                            <td>Jam Berlayar</td>
                            <td>:</td>
                            <td> {{ $bookings->time }}</td>
                            
                        </tr>
                        <tr>
                            <td>Tempat</td>
                            <td>:</td>
                            <td> {{ $bookings->place }}</td>
                            
                        </tr>
                        <tr>
                            <td>Metode Pembayaran</td>
                            <td>:</td>
                            <td class="d-flex" > <select class="form-select ms-1" name="method" aria-label="Default select example" style="width:120px">
                                
                                <option value="Tunai">Tunai</option>
                                <option value="SailPay">Sailpay</option>
                                
                              </select>
                            </td>
                        </tr>
                        
                        
                    </table>
                </div>
                <div class="col">
                    <img src="{{ asset($bookings->img_path) }}" alt="gambar-paket" class="img-fluid w-30 h-30">
                </div>
                {{-- <div class="col col-md-2">

                    <ul style="list-style-type: none;">
                        
                        <li></li>
                        <li>Fasilitas</li>
                        <li>Tanggal Berlayar</li>
                        <li>Jam Berlayar</li>
                        <li>Metode Pembayaran</li>
                    </ul>
                </div>
                <div class="col">
                    <ul style="list-style-type: none;">
                        <li>: {{ $bookings->product_name }}</li>
                        <li>: {{ $bookings->price }}</li>
                        <li>: {{ $bookings->product_desc }}</li>
                        <li>: {{ $bookings->date }}</li>
                        <li>: {{ $bookings->time }}</li>
                        <li class="d-flex" >: <select class="form-select ms-1" name="method" aria-label="Default select example" style="width:120px">
                            
                            <option value="Tunai">Tunai</option>
                            <option value="SailPay">Sailpay</option>
                            
                          </select>
                        </li>
                    </ul>
                </div>
                <div class="col">
                    <img src="{{ $bookings->img_path }}" alt="gambar-paket" class="img-fluid w-30 h-30">
                    
                </div> --}}
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
