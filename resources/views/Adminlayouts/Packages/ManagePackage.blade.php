@extends('Adminlayouts.adminmain',['title'=>'Manage Package'])
@section('content')
    <div class="container">
        <a href="manage/create" class="btn btn-outline-info">Create Package</a>
        <table class="table table-hover">
            <thead>
                <td>Product Name</td>
                <td>Price</td>
                <td>Product Description</td>
                <td>Date</td>
                <td>Est Time(from)</td>
                <td>Est Time(to)</td>
                <td>Date</td>
                <td>Action</td>
            </thead>
            <tbody>
                <tr>
                    <td>data 1</td>
                    <td>data 1</td>
                    <td>data 1</td>
                    <td>data 1</td>
                    <td>data 1</td>
                    <td>data 1</td>
                    <td>data 1</td>
                    <td>
                        <a href="/manage/{id}/edit" class="btn btn-info"><i class="fa-solid fa-pen-to-square"></i></a>
                        <a href="#" class="btn btn-danger"><i class="fa-solid fa-trash"></i></a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection