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
                        {{-- @foreach ($order as $item) --}}
                        @if ($order)
                            
                        
                            
                        <input type="hidden" name="id_order" value="{{ $order->id }}">
                        <input type="hidden" name="id_user" value="{{ $order->user_id }}">
                        <input type="hidden" name="time" value="{{ $order->time }}">
                        <input type="hidden" name="date" value="{{ $order->date }}">
                        <ul style="list-style-type: none">
                            <li>: {{ $order->product_name }}</li>
                            <li>: {{ $order->price }}</li>
                            <li>: {{ $order->time }}</li>
                            <li>: {{ $order->date }}</li>
                            <li class="d-flex">:
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
                        <img src="{{ asset($order->img_path) }}" alt="gambar" class="img_fluid rounded" style="width:300px">
                        {{-- @endforeach --}}
                    </div>
                </div>
                @endif
            </div>
            {{-- @endforeach --}}


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
                                    <button class="list-group-item list-group-item-action button1" data-bs-dismiss="modal" id="button1">
                                        <div class="d-flex justify-content-between">
                                            <span id="namanelayan" class="namanelayans">{{ $nelayan->username }}</span>
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
                // var nama = document.getElementById('namanelayan').innerHTML;

                // document.getElementById('button1').onclick = function () {
                    
                //     document.getElementById('nama').value = nama;
                    
                // }
                const buttons = document.querySelectorAll(".button1");
                for (let i = 0; i < buttons.length; i++) {
                    buttons[i].addEventListener("click", function() {
                    const span = buttons[i].querySelector(".namanelayans");
                        document.getElementById('nama').value = span.innerHTML;
                    });
                }
            </script>

        </div>
    </div>
</div>
</form>
@endsection