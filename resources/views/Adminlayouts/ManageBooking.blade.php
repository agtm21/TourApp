@extends('Adminlayouts.adminmain',['title'=>'Manage Booking'])
@section('content')
    <div class="container">
        <div class="d-flex my-3">
            <i class="fa-light fa-book-blank fa-2x"></i>
            <h1>Manage Booking</h1>
        </div>
        <table class="table table-hover">
            <thead class="bg-dark text-light text-center">
                {{-- <td>Username</td> --}}
                <td>ID Product</td>
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
                @if($orderitem->status == 'wait' || $orderitem->status == 'decline')
                {{-- <input type="hidden" name="id" value="{{ $orderitem->id }}"> --}}
                <tr>
                    
                    <td>{{ $orderitem->id }}</td>
                    
                    {{-- <td>{{$user->username }}</td> --}}
                    <td>{{$orderitem->product_name }}</td>
                    <td>{{ $orderitem->price }}</td>
                    <td>{{ $orderitem->time }}</td>
                    <td>{{ $orderitem->date }}</td>
                    <td>Sedang Memilih</td>
                    <td>Menunggu</td>
                    <td><a class="btn btn-success" href="nelayanbook/{{ $orderitem->id }}">Pilih Nelayan</a></td>
                </tr>
                @else
                <tr>

                    <td>{{ $orderitem->id }}</td>
                    <td>{{$orderitem->product_name }}</td>
                        <td>{{ $orderitem->price }}</td>
                        <td>{{ $orderitem->time }}</td>
                        <td>{{ $orderitem->date }}</td>
                        <td>{{ $orderitem->nama_nelayan }}</td>
                        <td>Proses Persetujuan</td>
                        <td>
                            <button class="btn btn-secondary">Lihat Detail</button>
                        </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
    
@endsection