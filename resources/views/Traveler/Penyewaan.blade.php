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
                        <li>Status</li>
                    </ul>
                </div>
                <div class="col col-md-7">
                    <ul style="list-style-type: none">
                        <li>: {{ $orderitem->product_name }}</li>
                        <li>: Rp. {{ $orderitem->price }}</li>
                        <li>: {{ $orderitem->product_desc }}</li>
                        <li>: {{ $orderitem->date }}</li>
                        <li>: {{ $orderitem->time }}</li>
                        <li>: <span class="text-danger fw-bold">Menunggu Konfirmasi</span> </li>
                    </ul>
                </div>
                <div class="col">
                    <img src="{{ $orderitem->img_path }}" alt="img-order" class="img-fluid rounded mb-3" style="width:300px">
{{--                     
                    <!-- Modal trigger button -->
                    <button type="button" class="btn btn-secondary offset-md-7" data-bs-toggle="modal" data-bs-target="#modalId">
                      Lihat Detail
                    </button>
                    
                    <!-- Modal Body -->
                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                    <div class="modal fade" id="modalId" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="modalTitleId">Detail</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body text-center">
                                     <ul style="list-style-type: none">
                                            <li><h3>Nama Paket</h3></li>    
                                            <li><img src="#" alt="img-order"></li>    
                                            <li>price</li>    
                                            <li>Tanggal</li>    
                                            <li>Waktu</li>    
                                            <li>Fasilitas</li>    
                                            <li>Nelayan</li>    
                                            <li>Status</li>    
                                        </ul>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    
                    <!-- Optional: Place to the bottom of scripts -->
                    <script>
                        const myModal = new bootstrap.Modal(document.getElementById('modalId'), options)
                    
                    </script> --}}
                    
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