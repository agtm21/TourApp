@extends('Nelayan.Homepage')
@section('container')
  <h5 class="text-center"></h5>
  <div class="container-fluid mx-5 my-5">
      <div class="row justify-content-start align-items-center g-2">
          <div class="col col-md-4">
              <div class="card col-md-8 bg-info h-50 shadow">
                  <div class="card-body">
                      <div class="row justify-content-between">
                        <div class="col">
                          <div class="d-flex align-items-center ">
                            <i class="fa-solid fa-book fa-2x me-2"></i>
                            <h5>Order</h5>
                            <h3 class="ms-4">{{ $order}}</h3>
                          </div>
                          
                        </div>
                        {{-- <div class="col">
                        </div>   --}}
                        
                      </div>
                  </div>
                  
                </div>
          </div>
          <div class="col col-md-4">
              <div class="card col-md-8 bg-info h-50 shadow">
                  <div class="card-body">
                      <div class="row justify-content-between">
                        <div class="col">
                          <div class="d-flex align-items-center">
                            <i class="fa-solid fa-book fa-2x me-2"></i>
                            <h5>Order Accepted</h5>
                            <h3>{{ $accept}}</h3>
                          </div>
                        </div>
                        {{-- <div class="col">
                          
                        </div>   --}}
                        
                      </div>
                  </div>
                  
                </div>
          </div>
          <div class="col col-md-4">
              <div class="card col-md-8 bg-info h-50 shadow">
                  <div class="card-body">
                      <div class="row justify-content-between">
                        <div class="col">
                          <div class="d-flex align-items-center">
                            <i class="fa-solid fa-book fa-2x me-2"></i>
                            <h5>Order Declined</h5>
                            <h3>{{ $decline}}</h3>
                          </div>
                        </div>
                        {{-- <div class="col">
                        </div>   --}}
                        
                      </div>
                  </div>
                  
                </div>
          </div>
      </div>
  </div>
@endsection