@extends('Adminlayouts.adminmain',['title'=>'Manage Booking'])
@section('content')
    <div class="container">
        <div class="d-flex my-3">
            <i class="fa-light fa-book-blank fa-2x"></i>
            <h1>Manage Booking</h1>
        </div>
        <table class="table table-hover">
            <thead>
                {{-- <td>Username</td> --}}
                <td>Product Name</td>
                <td>Price</td>
                <td>Time</td>
                <td>Date</td>
                <td>Nelayan</td>
                <td>Status</td>
                <td>action</td>
            </thead>
            <tbody>
                @foreach($order as $orderitem)
                @if($orderitem->status == '1')
                    {{-- <td>{{$user->username }}</td> --}}
                    <td>{{$orderitem->product_name }}</td>
                    <td>{{ $orderitem->price }}</td>
                    <td>{{ $orderitem->time }}</td>
                    <td>{{ $orderitem->date }}</td>
                    <td>Sedang Memilih</td>
                    <td>Menunggu</td>
                    <td><a class="btn btn-success" href="nelayanbook">Pilih Nelayan</a></td>
                @else
                <td>{{$orderitem->product_name }}</td>
                    <td>{{ $orderitem->price }}</td>
                    <td>{{ $orderitem->time }}</td>
                    <td>{{ $orderitem->date }}</td>
                    <td>{{ $orderitem->nama_nelayan }}</td>
                    <td>Selesai</td>
                    <td><button class="btn btn-secondary">Lihat Detail</button></td>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
@endsection