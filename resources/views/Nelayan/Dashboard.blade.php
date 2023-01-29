@extends('Nelayan.Homepage')
@section('container')
  <h5 class="text-center"></h5>
  <div class="container-fluid mx-5 my-5">
      <div class="row justify-content-start align-items-center g-2">
          <div class="col col-md-4">
              <button class="card col-md-6 bg-primary h-50 shadow">
                  <div class="card-body">
                      <div class="row justify-content-between">
                        <div class="col">
                          <a class="fw-bold text-dark text-decoration-none" href="/nelayan/order">Order</a>
                        </div>
                        <div class="col">
                          <i class="fa-solid fa-book"></i>
                        </div>  
                      </div>
                  </div>
              </button>
          </div>
      </div>
  </div>
@endsection