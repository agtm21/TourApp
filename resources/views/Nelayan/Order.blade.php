@extends('Nelayan.Homepage')
@section('container')
    <div class="container">
        
        <div class="card">
            <div class="card-header">
              <h3>Notifikasi</h3>
            </div>
            <div class="card-body bg-secondary">
                {{-- outer --}}
              

                @forelse ($notifications as $notification)
                  @if (!$notification->read_at)
                      
                  <div class="card mb-3">
                      <button class="card-body p-1 shadow rounded btn btn-outline-primary mark-as-read" data-bs-toggle="modal" data-bs-target="#exampleModal">
                            
                        <div class="d-flex justify-content-between ms-3">
                            <div class="d-inline-flex align-items-center">
                                <i class="fa-solid fa-envelope"></i>
                                <p class="fw-bold mt-3 ms-3">
                                  
                                  Anda Mendapatkan Pesanan!
                                  
                                </p>
                            </div>
                            <a  href="/notifications/{{ $notification->id }}/read" class="text-decoration-none">Mark As Read</a>
                        </div>
                      </button>
                    </div>
                  @else
                  <div class="card mb-3">
                    <button class="card-body p-1 shadow rounded btn btn-outline-primary mark-as-read" data-bs-toggle="modal" data-bs-target="#exampleModal">
                          
                      <div class="d-flex justify-content-between ms-3">
                          <div class="d-inline-flex align-items-center">
                              <i class="fa-solid fa-envelope-open"></i>
                              <p class="mt-3 ms-3">
                                
                                Anda Mendapatkan Pesanan!
                                
                              </p>
                          </div>
                          
                      </div>
                    </button>
                  </div>
                  @endif

                {{-- inner --}}
                      @empty
                          <p class="text-center text-light">Tidak ada Notifikasi</p>
                      @endforelse
                
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
              <div class="container text-center">
                @foreach ($notifications as $notification)
                    
                {{ $notification->data['nama'] }} 
                {{ $notification->data['message'] }}
                <b>
                  {{ $notification->data['pemesan'] }}
                </b>
                {{ $notification->data['date'] }}
                {{ $notification->data['time'] }}
                @endforeach
                
              </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
              {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
            </div>
          </div>
        </div>
      </div>
      
@endsection