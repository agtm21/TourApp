@extends('Adminlayouts.adminmain',['title'=>'Konfirmasi Pesanan'])
@section('content')
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
                            <li>Nama Pemesan</li>
                            <li>Waktu</li>
                            <li>Tanggal</li>
                            <li>Nelayan</li>
                        </ul>
                    </div>
                    <div class="col">
                        <ul style="list-style-type: none">
                            <li>: Barang 1</li>
                            <li>: User 1</li>
                            <li>: Waktu 1</li>
                            <li>: Tanggal</li>
                            <li>: 
                                <div class="input-group">
                                    <input type="text" class="form-control" id="nama" aria-label="Recipient's username" aria-describedby="button-addon2" onclick="this.value=''">
                                    <button type="button" id="targetbtn" class="btn btn-primary"
                                        data-bs-toggle="modal" data-bs-target="#nelayan">
                                        Pilih Nelayan
                                    </button>
                                </div>
                                <span id="choosen"></span>
                            </li>
                        </ul>
                    </div>
                    <div class="col">
                        <img src="#" alt="gambar">
                    </div>
                </div>

                {{-- <div class="row">
                    <div class="col">
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalId">
                            Pilih Nelayan
                        </button>
                    </div>
                </div> --}}
            </div>
            <!-- Button trigger modal -->
            <div class="modal fade" id="nelayan">
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
                                    @for($i=1;$i<5;$i++) <button class="list-group-item list-group-item-action"
                                        id="button1" >
                                        <div class="d-flex justify-content-between">
                                            <span id="namanelayan">nama</span>
                                            <img src="#" alt="gambar">
                                        </div>
                                        </button>
                                        @endfor
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script>
                var nama = document.getElementById('namanelayan').innerHTML;
               
                document.getElementById('button1').onclick = function(){
                    document.getElementById('nama').value = nama;
                    document.getElementById('nelayan').modal("hide");
                }
            </script>
            {{-- <!-- Modal -->
            <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="modalTitleId">Daftar Nelayan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="container-fluid">
                                <div class="list-group">
                                    @for($i=1;$i<5;$i++) <div class="list-group-item list-group-item-action list-group-item-light mb-2">
                                        <div class="d-flex justify-content-between">
                                            <span>Nelayan <?= $i?></span>
                                            <img src="#" alt="foto-nelayan" class="rounded-circle">
                                        </div>
                                </div>
                                @endfor
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                        <button type="button" class="btn btn-primary">Pilih</button>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var modalId = document.getElementById('modalId');

            modalId.addEventListener('show.bs.modal', function (event) {
                // Button that triggered the modal
                let button = event.relatedTarget;
                // Extract info from data-bs-* attributes
                let recipient = button.getAttribute('data-bs-whatever');

                // Use above variables to manipulate the DOM
            });
        </script> --}}


        </div>
    </div>
</div>
@endsection