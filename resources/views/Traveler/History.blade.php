@extends('layouts.main',['title'=>'Order History'])
@section('container')
    
@foreach($history as $historyitem)
{{-- cek status order berdasarkan id_user --}}
@if($historyitem->status == 0) 
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
                        <li>Status</li>
                        <li>Nelayan</li>
                    </ul>
                </div>
                <div class="col col-md-7">
                    <ul style="list-style-type: none">
                        <li>: {{ $historyitem->product_name }}</li>
                        <li>: Rp. {{ $historyitem->price }}</li>
                        <li>: {{ $historyitem->product_desc }}</li>
                        <li>: {{ $historyitem->date }}</li>
                        <li>: {{ $historyitem->time }}</li>
                        <li>: <span class="text-success fw-bold">Dikonfirmasi</span> </li>
                        <li>: 
                            {{ $historyitem->nama_nelayan }}
                        </li>
                    </ul>
                </div>
                <div class="col">
                    <img src="{{ $historyitem->img_path }}" alt="img-order" class="img-fluid rounded mb-3" style="width:300px">
                    
                    
                    
                    
                    <!-- Optional: Place to the bottom of scripts -->
                    <script>
                        const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
                    
                    </script>
                    
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