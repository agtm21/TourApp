@extends('layouts.main',['title'=> 'Penyewaan'])
@section('penyewaan')

@foreach ($booking as $item)
    @if ($item->status != 'accept')
    
    
    <div class="container">
        <div class="card mb-5">
            <div class="card-header bg-primary">
                <span class="fw-bold">Your Order</span>
            </div>
            <div class="card-body">

                <div class="row justify-content-between">
                    <div class="col col-md-7">
                        <div class="container">

                            <table>
                                <tr>
                                    <td class="col col-md-2">Nama Paket</td>
                                    <td>:</td>
                                    <td>{{ $item->product_name }}</td>
                                </tr>
                                <tr>
                                    <td>Harga</td>
                                    <td>:</td>
                                    <td>Rp. {{ $item->price }}</td>
                                </tr>
                                <tr>
                                    <td>Fasilitas</td>
                                    <td>:</td>
                                    <td>{{ $item->product_desc }}</td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>:</td>
                                    <td>{{ $item->date }}</td>
                                </tr>
                                <tr>
                                    <td>Waktu</td>
                                    <td>:</td>
                                    <td>{{ $item->time }}</td>
                                </tr>
                                <tr>
                                    <td>Status</td>
                                    <td>:</td>
                                    <td><span class="text-danger fw-bold">{{ $item->status }}</span> </td>
                                </tr>
                                <form action="/paymentprove" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <tr>
                                        <input type="hidden" name="order_id" value="{{ $item->id }}">
                                        <td>Bukti Pembayaran</td>
                                        <td>:</td>
                                        <td>
                                            <input type="file" name="bukti_pembayaran" id="bukti_pembayaran" accept="image/*" class="form-control" role="button">
                                    </td>
                                </tr>
                                <tr>
                                    <td>

                                        <button class="btn btn-info mt-3">Kirim</button>
                                    </td>
                                </tr>
                            </form>
                            </table>
                        </div>
                    </div>
                    
                    <div class="col">
                        <img src="{{ $item->img_path }}" alt="img_order" class="img-fluid" >
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