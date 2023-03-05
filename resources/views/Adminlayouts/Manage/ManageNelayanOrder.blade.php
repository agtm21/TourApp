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
                    <td>Nama Paket</td>
                    <td>Tanggal Order</td>
                    <td>Jumlah Pesanan</td>
                </tr>
            </thead>
            <tbody>
                @forelse ($nelayan as $n)
                    <tr>
                    
                        <td>{{ $n->nama_nelayan }}</td>
                        <td>{{ $n->product_name }}</td>
                        <td>{{ $n->date }}</td>
                        <td>
                            {{ $n->nelayan_count }}
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="2">Tidak Ada Data</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
@endsection
