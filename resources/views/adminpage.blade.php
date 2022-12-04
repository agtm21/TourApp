@extends('layouts.adminmain',['title'=> 'AdminPage'])
@section('content')
<div class="container-fluid mt-5 px-5">
    <div class="row">
      <div class="col">
        <span class="fs-2">Dashboard</span>
      </div>
    </div>
    
  {{-- Small Box General Data Info --}}
    <div class="row">
      <div class="col-lg-3 col-6">
        <div class="small-box bg-info rounded shadow-sm">
          <div class="row">
            <div class="col-md-7">
              <div class="inner">
                <h3 class="fs-1 fw-bold">1500</h3>
                <p class="fs-5">Users</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icon pt-4">
                <i class="fa-solid fa-user fa-5x"></i>
              </div>
            </div>
          </div>
            <a href="#" id="nelayan" class="small-box-footer d-flex bd-highlight p-2 text-light text-decoration-none rounded-bottom">
              <span class="mx-auto fw-bold">More info<i class="fas fa-arrow-circle-right mx-2"></i></span>
            </a>
        </div>
      </div>

      {{-- Next Col --}}
      <div class="col-lg-3 col-6">
        <div class="small-box bg-warning rounded shadow-sm">
          <div class="row">
            <div class="col-md-7">
              <div class="inner">
                <h3 class="fs-1 fw-bold">1500</h3>
                <p class="fs-5">Sales</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icon pt-4">
                <i class="fa-solid fa-chart-simple fa-5x"></i>
              </div>
            </div>
          </div>
            <a href="#" id="traveler"  class="small-box-footer d-flex bd-highlight p-2 text-light text-decoration-none rounded-bottom">
              <span class="mx-auto fw-bold">More info<i class="fas fa-arrow-circle-right mx-2"></i></span>
            </a>
        </div>
      </div>

      {{-- Next Col --}}
      <div class="col-lg-3 col-6">
        <div class="small-box bg-success rounded shadow-sm">
          <div class="row">
            <div class="col-md-7">
              <div class="inner">
                <h3 class="fs-1 fw-bold">1500</h3>
                <p class="fs-5">New Users</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icon pt-4">
                <i class="fa-solid fa-user-plus fa-5x"></i>
              </div>
            </div>
          </div>
            <a href="#" id="newuser" class="small-box-footer d-flex bd-highlight p-2 text-light text-decoration-none rounded-bottom">
              <span class="mx-auto fw-bold">More info<i class="fas fa-arrow-circle-right mx-2"></i></span>
            </a>
        </div>
      </div>

      {{-- Next Col --}}
      <div class="col-lg-3 col-6">
        <div class="small-box bg-danger rounded shadow-sm">
          <div class="row">
            <div class="col-md-7">
              <div class="inner">
                <h3 class="fs-1 fw-bold">1500</h3>
                <p class="fs-5">Daily Order</p>
              </div>
            </div>
            <div class="col-md-4">
              <div class="icon pt-4">
                <i class="fa-solid fa-bag-shopping fa-5x"></i>
              </div>
            </div>
          </div>
            <a href="#" id ="order" class="small-box-footer d-flex bd-highlight p-2 text-light text-decoration-none rounded-bottom">
              <span class="mx-auto fw-bold">More info<i class="fas fa-arrow-circle-right mx-2"></i></span>
            </a>
        </div>
      </div>
    </div>
    {{-- End Small Box General Data Info --}}

    {{-- Chart --}}
    <div class="row">
      <div class="col col-md-7">
        <div class="card my-5">
          <div class="card-header">
            <span class="fs-3 ">Sales</span>
          </div>
          <div class="card-body">
            <div class="chart" id="chart">
              
            </div>
          </div>
        </div>
      </div>
      {{-- End Of Chart --}}
      <div class="col col-md-5">
        <div class="card bg-primary mt-5">
          <div class="card-header">
            <div class="card-title">
              <i class="far fa-calendar fa-2x"></i>
              <span class="fs-3 text-light">Calendar</span>
            </div>
          </div>
          <div class="card-body pt-0">
            <div id="calendar" style="width: :100%">
            </div>
          </div>
        </div>
      </div>
    </div>
  {{-- End Of Small Box --}}
@endsection