@extends('layouts.main',['title'=>'Order History'])
@section('history')

@forelse($history as $historyitem)

{{-- cek status order berdasarkan id_user --}}
@if($historyitem->status == 'accept') 
    <div class="container">
       <div class="card mb-3">
        <div class="card-header">
            Your Order
        </div>
        <div class="card-body">
            
            <div class="row justify-content-center align-items-center g-2">
                <div class="col col-md-8">
                    <table>
                        <tr>
                            <td class="col col-md-2">Nama Paket</td>
                            <td>:</td>
                            <td>{{ $historyitem->product_name }}</td>
                        </tr>
                        <tr>
                            <td>Harga</td>
                            <td>:</td>
                            <td>{{ $historyitem->price }}</td>
                        </tr>
                        <tr>
                            <td>Fasilitas</td>
                            <td>:</td>
                            <td>{{ $historyitem->product_desc }}</td>
                        </tr>
                        <tr>
                            <td>Tanggal</td>
                            <td>:</td>
                            <td>{{ $historyitem->date }}</td>
                        </tr>
                        <tr>
                            <td>Waktu</td>
                            <td>:</td>
                            <td>{{ $historyitem->time }}</td>
                        </tr>
                        <tr>
                            <td>Status</td>
                            <td>:</td>
                            <td class="text-success">
                                <b>

                                    {{ $historyitem->status }}
                                </b>
                            </td>
                        </tr>
                        <tr>
                            <td>Nelayan</td>
                            <td>:</td>
                            <td>{{ $historyitem->nama_nelayan }}</td>
                        </tr>
                    </table>
                </div>
                <div class="col">
                    <img src="{{ $historyitem->img_path }}" alt="img-order" class="img-fluid rounded mb-3" style="width:300px">

                </div>
            </div>
            {{-- <div class="row justify-content-center align-items-center g-2">
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
                        <li>: <span class="text-success fw-bold">{{ $historyitem->status }}</span> </li>
                        <li>: 
                            {{ $historyitem->nama_nelayan }}
                        </li>
                    </ul>
                </div>
                <div class="col">
                    <img src="{{ $historyitem->img_path }}" alt="img-order" class="img-fluid rounded mb-3" style="width:300px">

                </div>
            </div> --}}
            
        </div>
       </div>
    </div>
    @endif
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
@endsection