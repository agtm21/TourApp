@extends('layouts.main',['title'=>'Home'])
@section('homepage')



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
                  
                  {{ substr($books->product_desc,0,60) }} ... 
                  <a href="#fulltext-{{ $books->id }}">Read more</a>
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
<div class="fixed-bottom d-flex justify-content-end">
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
              {{-- slider --}}
              <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                  <div class="carousel-item active">
                    <img src="{{ URL::asset('img/sliderhelp.jpg') }}" class="d-block w-30" alt="c1">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ URL::asset('img/konfirmhelp.jpg') }}" class="d-block w-30" alt="c2">
                  </div>
                  <div class="carousel-item">
                    <img src="{{ URL::asset('img/navbarhelp.jpg') }}" class="d-block w-30" alt="c3">
                  </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                  <span class="carousel-control-next-icon" aria-hidden="true"></span>
                  <span class="visually-hidden">Next</span>
                </button>
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
{{-- 
    Note :
    Buat Database dengan Tabel
    ID,Package Name, Description,image
    --}}