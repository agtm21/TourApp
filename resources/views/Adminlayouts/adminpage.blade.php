@extends('Adminlayouts.adminmain',['title'=> 'Dashboard'])
@section('content')

<div class="container-fluid mt-5 px-5">
    <div class="row">
        <div class="col">
            <h1 class="mb-3">Dashboard</h1>
        </div>
    </div>

    {{-- Small Box General Data Info --}}
    {{-- col1 --}}
    <div class="row">
        <div class="col-lg-3 col-6">
            <div class="card  rounded h-100 bg-info">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h3 class="fs-3 fw-bold text-light">{{ $countuser }}</h3>
                                <p class="fs-5 text-light">Users</p>
                            </div>
                            <div class="col">
                                <i class="fa-solid fa-user fa-5x"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer hover">
                    <a href="/datauser" id="nelayan"
                        class="small-box-footer d-flex bd-highlight p-2 text-light text-decoration-none rounded-bottom">
                        <span class="mx-auto fw-bold">More info<i class="fas fa-arrow-circle-right mx-2"></i></span>
                    </a>
                </div>
            </div>
        </div>
        {{-- col 2 --}}
        <div class="col-lg-3 col-6">
            <div class="card  rounded h-100 bg-success">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h3 class="fs-3 fw-bold text-light">{{ $order }}</h3>
                                <p class="fs-5 text-light">Order</p>
                            </div>
                            <div class="col">
                                <i class="fa-solid fa-bag-shopping fa-5x"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer hover">
                    <a href="/managebooking" id="nelayan"
                        class="small-box-footer d-flex bd-highlight p-2 text-light text-decoration-none rounded-bottom">
                        <span class="mx-auto fw-bold">More info<i class="fas fa-arrow-circle-right mx-2"></i></span>
                    </a>
                </div>
            </div>
        </div>
        {{-- col 3 --}}
        <div class="col-lg-3 col-6">
            <div class="card  rounded h-100 bg-warning ">
                <div class="card-body">
                    <div class="container">
                        <div class="row">
                            <div class="col">
                                <h3 class="fs-3 fw-bold text-light">{{ $booking }}</h3>
                                <p class="fs-5 text-light">Paket</p>
                            </div>
                            <div class="col">
                                <i class="fa-solid fa-store fa-5x" ></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer hover">
                    <a href="/managepackage" id="nelayan"
                        class="small-box-footer d-flex bd-highlight p-2 text-light text-decoration-none rounded-bottom">
                        <span class="mx-auto fw-bold">More info<i class="fas fa-arrow-circle-right mx-2"></i></span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- <div class="small-box bg-info rounded shadow-sm h-100">
          <div class="row">
            <div class="col-md-7">
              <div class="inner">
                <h3 class="fs-3 fw-bold">{{ $countuser }}</h3>
<p class="fs-5">Users</p>
</div>
</div>
<div class="col-md-4">
    <div class="icon pt-4">
        <i class="fa-solid fa-user fa-5x"></i>
    </div>
</div>
</div>
<a href="/datauser" id="nelayan"
    class="small-box-footer d-flex bd-highlight p-2 text-light text-decoration-none rounded-bottom">
    <span class="mx-auto fw-bold">More info<i class="fas fa-arrow-circle-right mx-2"></i></span>
</a>
</div>
</div> --}}
{{-- col2 --}}



@endsection