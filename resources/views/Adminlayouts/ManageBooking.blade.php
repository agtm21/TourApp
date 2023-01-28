@extends('Adminlayouts.adminmain',['title'=>'Manage Booking'])
@section('content')
    <div class="container">
        <div class="d-flex my-3">
            <i class="fa-light fa-book-blank fa-2x"></i>
            <h1>Manage Booking</h1>
        </div>
        <table class="table table-hover">
            <thead>
                <td>Id Product</td>
                <td>User Uuid</td>
                <td>Username</td>
                <td>Product Name</td>
                <td>Price</td>
                <td>Time (from)</td>
                <td>Time (to)</td>
                <td>Date</td>
                <td>Nelayan</td>
                <td>Status</td>
                <td>action</td>
            </thead>
            <tbody>
                @for($i=1;$i<=8;$i++)
                   
                    <td>Data <?= $i?> </td>
                @endfor
                {{-- nelayan --}}
                <td></td>
                @if($status == '1')
                    <td>On Process</td>
                    <td><a class="btn btn-success" href="nelayanbook">Pilih Nelayan</a></td>
                @else
                    <td>Selesai</td>
                    <td><button class="btn btn-secondary">Lihat Detail</button></td>
                @endif
                
            </tbody>
        </table>
    </div>
@endsection