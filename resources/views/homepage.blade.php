@extends('layouts.main',['title'=>'Home'])
@section('packagelist')

  <div class="row">
      <div class="col">
          <div class="card shadow p-3 mb-5 rounded" style="width: 18rem;">
            <div class="p-4">
              <img src="img/Cardboard_pile_of_boxes_art_illustration.jpg" alt="package-box" class="card-img-top">
            </div>
              <div class="card-title">
                  <div class="d-flex justify-content-between mx-3">
                      <h5>Packet 1</h5>
                      <h5 class="text-danger">Price</h5>
                  </div>
              </div>
              <div class="card-body">
                  <p class="card-text text-dark">Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                  <a href="#" class="btn btn-warning rounded px-4">
                  <i class="fa-regular fa-credit-card"></i>  
                  Order
                </a>
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