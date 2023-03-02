@extends('layouts.main',['title'=>'Home'])
@section('homepage')


{{-- <video width="640" height="360" controls>
  <source  src="Video/guide.mp4" type="video/mp4">
</video> --}}
<div class="fs-1 fw-bold">

    <p>@lang('pages.title.homepage')</p>
</div>
<div class="row">
    @foreach($bookings as $books)
    <div class="col-lg-4 mb-3 d-flex align-items-stretch">
        <div class="card shadow p-3 mb-5 rounded" style="width: 18rem;">
            <div class="pb-2">
                <img src="{{ $books->img_path }}" alt="package-box" class="card-img-top">
            </div>

            <div class="card-title">
                <div class="d-flex justify-content-between mx-3">
                    <h6>{{ $books->product_name }}</h6>
                    <h6 class="text-danger">Rp. {{ $books->price }}</h6>
                </div>
                <div>

                </div>
            </div>
            <div class="card-body d-flex flex-column">
                <div class="d-flex mb-3">
                  <i class="fa-solid fa-location-dot text-muted " > {{ $books->place }}</i>
                  
                </div>
                <p class="card-text text-dark h-100 text-justify" id="fulltext-{{ $books->id }}" >
                  
                  {{ $books->product_desc }}
                  {{-- <a href="#fulltext-{{ $books->id }}">Read more</a> --}}
                </p>
                <a href="/prosespenyewaan/{{ $books->id }}" class="btn btn-warning rounded px-4">
                    <i class="fa-regular fa-credit-card"></i>
                    @lang('pages.order')
                </a>
            </div>
        </div>
    </div>
    @endforeach
</div>
<div class="d-flex justify-content-center">
    {{ $bookings->links() }}
</div>
{{-- <div class="fixed-bottom d-flex justify-content-end">
    <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary me-5 mb-5" data-bs-toggle="modal" data-bs-target="#exampleModal">
      <i class="fa-sharp fa-solid fa-circle-question"></i>
    </button>

</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">User Guide</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
              <div class="container">
                <div class="row">
                  <div class="list-group list-group-flush mb-3">
                    <a class="btn btn-info list-group-item " 
                    data-bs-toggle="modal" 
                    data-bs-target="#order"
                    href="#order" 
                    role="button" 
                    aria-expanded="false" 
                    aria-controls="order">
                      Bagaimana Cara Memesan?
                    </a>
                    <a class="btn btn-info list-group-item"
                    data-bs-toggle="collapse" 
                    href="#topup" 
                    role="button" 
                    aria-expanded="false" 
                    aria-controls="topup">
                      Bagaimana Cara Topup?
                    </a>
                    <div class="collapse" id="topup">
                      <div class="card">
                        
                        <b class="card-title text-center mt-3">TopUp Sailpay</b>
                        <div class="card-body">

                          <ul style="list-style-type: none;">
                            <p>Cara Topup Sailpay:</p>
                            <li>1. Masukkan Jumlah Uang (Min: 10.000 IDR/0.67 USD)</li>
                            <li>2. Pilih Mata Uang</li>
                            <li>3. Pilih Metode Pembayaran</li>
                            <li>4. Klik Submit</li>
                          </ul>
                        </div>
                      </div>
                    </div>
                    <a class="btn btn-info list-group-item"
                    data-bs-toggle="collapse" 
                    href="#status" 
                    role="button" 
                    aria-expanded="false" 
                    aria-controls="status">
                      Status dalam Pesanan?
                    </a>
                  </div>
                  
                  
                  <div class="collapse" id="status">
                    <h5 class="text-center mb-3">
                      STATUS PESANAN
                    </h5>
                    <ul style="list-style-type: none;">
                    <li>
                      <p><b class="text-danger">WAIT</b>-> Paket dalam proses pemilihan Nelayan oleh Admin</p>
                    </li>
                    <li>
                      <p><b class="text-danger">PROCESS</b>-> Proses Persetujuan Nelayan</p>
                    </li>
                    <li>
                      <p><b class="text-success">ACCEPT</b>-> Nelayan Menyetujui Pesanan</p>
                    </li>
                    <li>
                      <p><b class="text-success">DECLINE</b>-> Nelayan Menolak Pesanan</p>
                    </li>
                    </ul>
                  </div>

                </div>
              </div>
            </div>
        </div>
    </div>
</div> --}}
{{-- modal untuk guide  --}}
{{-- <div class="modal modal-lg fade" id="order" aria-hidden="true" aria-labelledby="exampleModalToggleLabel2" tabindex="-1">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalToggleLabel2">Bagaimana cara Memesan</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <img src="{{ asset('img/guide.jpeg') }}" alt="guide" height="800" width="760">
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary" data-bs-target="#exampleModal" data-bs-toggle="modal">Back</button>
      </div>
    </div>
  </div>
</div> --}}
<script>
  // Get all the collapsible elements
var collapsibles = document.querySelectorAll('.collapse');

// Add click event listeners to each button
var buttons = document.querySelectorAll('.btn');
for (var i = 0; i < buttons.length; i++) { //count all button
  buttons[i].addEventListener('click', function() {//for button click
    var target = document.querySelector(this.getAttribute('href')); //all href as reference
    if (!target.classList.contains('show')) {//if the current target shown
      // Close all other collapsibles
      for (var j = 0; j < collapsibles.length; j++) {
        if (collapsibles[j] !== target && collapsibles[j].classList.contains('show')) {
          collapsibles[j].classList.remove('show');
        }
      }
    }
  });
}
</script>
@endsection
