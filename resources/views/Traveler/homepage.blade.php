@extends('layouts.main',['title'=>'Home'])
@section('packagelist')
  
{{-- search box --}}
<div class="container my-5">
  <form class="d-flex">
      <div class="col">
          <div class="mb-3">
            <form action="/search" method="GET">
              <label for="" class="form-label">@lang('pages.search')</label>
              <input type="text" name="search" id="search" class="form-control" placeholder="" aria-describedby="helpId">
              <small id="helpId" class="text-muted">Cari Paket...</small>
            </form>
          </div>
      </div>
  </form>
</div>
{{-- end of search box --}}
<div class="fs-1 fw-bold">
  <p>@lang('pages.title.homepage')</p>
</div>
  <div class="row">
    @foreach($bookings as $books)
      <div class="col">
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
              <div class="card-body">
                  <p class="card-text text-dark">{{ $books->product_desc }}</p>
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
@endsection
{{-- 
    Note :
    Buat Database dengan Tabel
    ID,Package Name, Description,image
    --}}