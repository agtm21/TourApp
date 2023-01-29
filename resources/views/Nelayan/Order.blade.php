@extends('Nelayan.Homepage')
@section('container')
    <div class="container">
        <h1>Notifikasi Pesanan</h1>
        <div class="card">
            <div class="card-body bg-secondary">
                {{-- outer --}}
                <div class="card mb-3">
                    {{-- inner --}}
                    <button class="card-body p-1 shadow rounded btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" >

                        <div class="d-flex justify-content-between ms-3">
                            <div class="d-inline-flex align-items-center">
                                <i class="fa-solid fa-envelope"></i>
                                <p class="fw-bold mt-3 ms-3">Text Here</p>
                            </div>
                            <p class="me-3 mt-3">date</p>
                        </div>
                    </button>
                </div>
                
            </div>
            
        </div>
    </div>
    {{-- modal --}}
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h1 class="modal-title fs-5" id="exampleModalLabel">Notifikasi Pesanan</h1>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              Anda Menangani Pelanggan Bernama (nama_user) pada tanggal (date) Jam(waktu)

            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
          </div>
        </div>
      </div>
@endsection