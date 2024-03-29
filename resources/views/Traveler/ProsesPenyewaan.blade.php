@extends('layouts.main',['title'=>'Konfirmasi Pesanan'])
@section('prosespenyewaan')

<form action="/confirm" method="POST" enctype="multipart/form-data">
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
                {{-- <input type="hidden" value="{{ $bookings->date}}" name="date">
                <input type="hidden" value="{{$bookings->time }}" name="time"> --}}
                <input type="hidden" value="{{$bookings->place }}" name="place">
                <input type="hidden" value="{{$bookings->img_path  }}" name="img_path">
                {{-- <input type="hidden" value="sailpay" name="method"> --}}
                
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
                            <td> 
                                <input type="date" name="date" id="date" class="form-control" required>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>Jam Berlayar</td>
                            <td>:</td>
                            <td> 
                                <input type="time" name="time" id="time" class="form-control" required>
                            </td>
                            
                        </tr>
                        <tr>
                            <td>Tempat</td>
                            <td>:</td>
                            <td> {{ $bookings->place }}</td>
                            
                        </tr>
                        <tr>
                            <td>No. Rekening</td>
                            <td>:</td>
                            <td> 
                               <b>

                                    5188102373848974
                               </b>
                                {{-- <input type="file" name="buktipembayaran" id="buktipembayaran" accept="image/*" class="form-control"> --}}
                            </td>
                        </tr>
                        
                        
                    </table>
                </div>
                <div class="col">
                    <img src="{{ asset($bookings->img_path) }}" alt="gambar-paket" class="img-fluid w-30 h-30">
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
{{-- <button id="jsontest" >test</button>    --}}
</form>

@endsection

