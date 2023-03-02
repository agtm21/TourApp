@extends('Adminlayouts.adminmain',['title'=>'Manage Nelayan Order'])
@section('managenelayanorder')
    <div class="container m-3">
        <p class="fs-2">
            <b>
                Manage Nelayan Order
            </b>
        </p>
        <table class="table table-responsive table-striped text-center">
            <thead class="bg-dark text-white border">
                <tr>
                    
                    <td>Nelayan</td>
                    <td>Jumlah Pesanan</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($nelayan as $n)
                    <tr>
                    
                        <td>{{ $n->nama_nelayan }}</td>
                        <td>
                            {{ $n->count }}
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
