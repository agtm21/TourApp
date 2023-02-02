@extends('Adminlayouts.adminmain',['title'=>'Manage Package'])
@section('content')
    <div class="container">
        <div class="mt-4 mb-3">
            <h1>Manage Package</h1>
        </div>
        <div class="mt-3">
            
            <a href="manage/create" class="btn btn-outline-info mb-3"><i class="fa-solid fa-plus"></i>  Create Package</a>
        </div>
        <table class="table table-hover table-sm">
            <thead class="bg-dark text-light text-center">
                <td>ID Product</td>
                <td>Product Name</td>
                <td>Product Description</td>
                <td>Price</td>
                <td>Date</td>
                <td>Time</td>
                <td>Action</td>
            </thead>
            <tbody>
                @foreach ($booking as $bk)
                <tr>
                    
                    <td>{{ $bk->id }}</td>
                    <td>{{ $bk->product_name }}</td>
                    <td>{{ $bk->product_desc }}</td>
                    <td>{{ $bk->price }}</td>
                    <td>{{ $bk->date }}</td>
                    <td>{{ $bk->time }}</td>
                    <td>
                        <a href="/manage/{id}/edit" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection