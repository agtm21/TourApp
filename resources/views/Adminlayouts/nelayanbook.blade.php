@extends('Adminlayouts.adminmain',['title'=>'Konfirmasi Pesanan'])
@section('content')
<form action="/confirm/nelayan" method="post">
    @csrf
<div class="container">
    <div class="card mt-4">
        <div class="card-header">
            <div class="card-title">
                <b>Konfirmasi Pesanan</b>
            </div>
        </div>
        <div class="card-body">
            <div class="container">
                <div class="row">
                    <div class="col col-2">
                        <ul style="list-style-type: none">
                            <li>Nama Barang</li>
                            <li>Price</li>
                            <li>Waktu</li>
                            <li>Tanggal</li>
                            <li>Nelayan</li>
                        </ul>
                    </div>
                    <div class="col">
                        @foreach ($order as $item)
                        @if ($item->status == 1)
                            
                        
                            
                        <input type="hidden" name="id_order" value="{{ $item->id_order }}">
                        <input type="hidden" name="id_user" value="{{ $item->id_user }}">
                        <ul style="list-style-type: none">
                            <li>: {{ $item->product_name }}</li>
                            <li>: {{ $item->price }}</li>
                            <li>: {{ $item->time }}</li>
                            <li>: {{ $item->date }}</li>
                            <li>:
                                {{-- Button Here --}}
                                <div class="input-group">
                                    <input type="text" class="form-control" id="nama" name="nelayanfield" aria-label="Recipient's username"
                                        aria-describedby="button-addon2" onclick="this.value=''">
                                    <button type="button" id="targetbtn" class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#nelayan">
                                        Pilih Nelayan
                                    </button>
                                </div>

                            </li>
                        </ul>
                        
                    </div>
                    <div class="col col-md-4">
                        {{-- @foreach($order as $item) --}}
                        <img src="{{ $item->img_path }}" alt="gambar" class="img_fluid rounded" style="width:300px">
                        {{-- @endforeach --}}
                    </div>
                </div>
                @endif
                @endforeach
            </div>


            <!-- Button trigger modal -->
            <div class="modal" id="nelayan">
                <div class="modal-dialog  modal-lg  
                            modal-dialog-scrollable ">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="GFGLabel">
                                Daftar Nelayan
                            </h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="list-group list-group-flush">
                                    @foreach($user as $nelayan) 
                                    {{-- data-bs-dismiss di button berfungsi untuk close button setelah di klik pada modal --}}
                                    <button class="list-group-item list-group-item-action" data-bs-dismiss="modal" id="button1">
                                        <div class="d-flex justify-content-between">
                                            <span id="namanelayan">{{ $nelayan->username }}</span>
                                            <img src="#" alt="gambar">
                                        </div>
                                    </button>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                var nama = document.getElementById('namanelayan').innerHTML;

                document.getElementById('button1').onclick = function () {
                    document.getElementById('nama').value = nama;
                    
                }
            </script>

        </div>
    </div>
</div>
</form>
@endsection