@extends('Nelayan.Homepage')
@section('container')
<div class="container">
    {{-- @if (session()->has('success'))
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif
@if (session()->has('error'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    {{ session('error') }}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif --}}
<div class="card">
    <div class="card-header">
        <h3>Notifikasi</h3>
    </div>
    <div class="card-body bg-secondary">
        {{-- outer --}}


        @foreach ($notifications as $notification)
        @if (!$notification->read_at)
        <input type="hidden" name="notifId" id="notifId" value="{{ $notification->id }}">
        <input type="hidden" name="id_order" id="id_order" value="{{ $notification->data['id_order'] }}">
        <input type="hidden" name="usernamenel" id="usernamenel" value="{{ auth()->user()->username }}">
        <div class="card mb-3">
            <button class="card-body p-1 shadow rounded btn btn-outline-primary mark-as-read" data-bs-toggle="modal"
                data-bs-target="#exampleModal{{ $notification->id }}">

                <div class="d-flex justify-content-between ms-3">
                    <div class="d-inline-flex align-items-center">
                        <i class="fa-solid fa-envelope"></i>
                        <p class="fw-bold mt-3 ms-3">

                            Anda Mendapatkan Pesanan!

                        </p>
                    </div>
                    <a href="/notifications/{{ $notification->id }}/read" class="text-decoration-none pt-3 pe-3">Mark As
                        Read</a>
                </div>
            </button>
        </div>

        {{-- modal --}}
        <div class="modal fade" id="exampleModal{{ $notification->id }}" tabindex="-1"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Notifikasi Pesanan</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="container">
                            <div class="card bg-secondary">
                                <b class=" fs-2 text-center my-4"> Dolphin Tour</b>
                                <div class="card-body">
                                    <div class="row border bg-white">
                                        <div class="col">
                                            {{-- @foreach ($notifications as $notification) --}}

                                            <b class="mt-4">
                                                {{ $notification->data['greeting'] }}
                                            </b>
                                            <p>
                                                {{ $notification->data['body'] }}

                                            </p>
                                            <p>
                                                {{ $notification->data['date'] }}
                                            </p>
                                            <p class="mb-4">
                                                {{ $notification->data['time'] }}
                                            </p>
                                            {{-- @endforeach --}}
                                        </div>
                                    </div>
                                    <div class="text-center my-4">
                                        © 2022 Copyright:
                                        <a class="text-dark" href="/">Dolphintour.com</a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    {{-- @if ($errors->isEmpty()) --}}

                    <div class="modal-footer">
                        <form action="/nelayan/confirmorder" method="post">
                            @csrf
                            {{-- <input type="hidden" name="username" value="{{ auth()->user()->username }}"> --}}
                            <input type="hidden" name="status" id="status" value="">
                            {{-- @foreach($notifications as $notification) --}}
                            <input type="hidden" name="idorder" value="{{ $notification->data['id_order'] }}">
                            {{-- <input type="text" name="order" id="order" value="{{ $order }}"> --}}

                            {{-- @endforeach --}}
                            <button type="submit" class="btn btn-danger" data-bs-dismiss="modal"
                                id="declinebtn">Tolak</button>
                            <button type="submit" class="btn btn-success" data-bs-dismiss="modal"
                                id="accbtn">Terima</button>


                        </form>
                    </div>
                    {{-- @endif --}}
                </div>
            </div>
        </div>
        @else
        <div class="card mb-3">
            <button class="card-body p-1 shadow rounded btn btn-outline-primary mark-as-read" data-bs-toggle="modal"
                data-bs-target="#exampleModal{{ $notification->id }}">

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
        {{-- modal --}}
        <div class="modal fade" id="exampleModal{{ $notification->id }}" tabindex="-1"
          aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
              <div class="modal-content">
                  <div class="modal-header">
                      <h1 class="modal-title fs-5" id="exampleModalLabel">Notifikasi Pesanan</h1>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                      <div class="container">
                          <div class="card bg-secondary">
                              <b class=" fs-2 text-center my-4"> Dolphin Tour</b>
                              <div class="card-body">
                                  <div class="row border bg-white">
                                      <div class="col">
                                          {{-- @foreach ($notifications as $notification) --}}

                                          <b class="mt-4">
                                              {{ $notification->data['greeting'] }}
                                          </b>
                                          <p>
                                              {{ $notification->data['body'] }}

                                          </p>
                                          <p>
                                              {{ $notification->data['date'] }}
                                          </p>
                                          <p class="mb-4">
                                              {{ $notification->data['time'] }}
                                          </p>
                                          {{-- @endforeach --}}
                                      </div>
                                  </div>
                                  <div class="text-center my-4">
                                      © 2022 Copyright:
                                      <a class="text-dark" href="/">Dolphintour.com</a>
                                  </div>
                              </div>
                          </div>

                      </div>
                  </div>
                  {{-- @if ($errors->isEmpty()) --}}

                  <div class="modal-footer">
                      {{-- <form action="/nelayan/confirmorder" method="post">
                          @csrf
                          
                          <input type="hidden" name="status" id="status" value="">
                          @foreach($notifications as $notification)
                          <input type="hidden" name="idorder" value="{{ $notification->data['id_order'] }}">
                         

                          @endforeach
                          <button type="submit" class="btn btn-danger" data-bs-dismiss="modal"
                              id="declinebtn">Tolak</button>
                          <button type="submit" class="btn btn-success" data-bs-dismiss="modal"
                              id="accbtn">Terima</button>


                      </form> --}}
                  </div>
                  {{-- @endif --}}
              </div>
          </div>
      </div>
        @endif

        {{-- inner
        @empty
        <p class="text-center text-light">Tidak ada Notifikasi</p> --}}
        @endforeach

    </div>

</div>
</div>
{{-- <div class="container">
      <input type="text" name="status" id="status" value="">
    </div> --}}

<script>
    document.getElementById('accbtn').addEventListener("click", accept);
    document.getElementById('declinebtn').addEventListener("click", decline);
    function accept() {
        document.getElementById('status').value = 'accept';
    }

    function decline() {
        document.getElementById('status').value = 'decline';
    }

   
</script>
@endsection