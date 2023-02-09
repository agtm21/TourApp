@extends('layouts.main',['title'=>'Topup'])
@section('topup')
@if (session()->has('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>    
      @endif
      @if (session()->has('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('loginerror') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>    
      @endif

<div class="container-fluid">
    <h1 class="mb-3">Topup Sail-pay</h1>
    <div class="card mb-3">
        <img src="img/SailCoin.png" class="ms-3 mt-3" alt="Title" width="30px" height="30">
        <div class="card-body">
            <p class="card-text">Saldo: Rp. {{ $balance->amount }}</p>
        </div>
    </div>
    <form action="/prosesTopup" method="post">
        @csrf
        <input type="text" name="amount" id="amount" class="form-control mb-3" placeholder="example: Rp. 10.000">
        <div class="d-flex mb-3">
            <span class="me-2">
                Currency:
            </span>
            <select class="form-select" style="width:100px" name="select">
                
                <option  value="usd">USD</option>
                <option selected value="idr">IDR</option>
                
              </select>
          </div>
        <div class="form-check">
            <input class="form-check-input" type="radio" name="method" id="flexRadioDefault1" value="Bank">
            <label class="form-check-label" for="flexRadioDefault1">
              Bank
            </label>
          </div>
          <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="method" id="flexRadioDefault2" value="Paypal">
            <label class="form-check-label" for="flexRadioDefault2">
              Paypal
            </label>
          </div>
          
        <button class="btn btn-info mb-3" type="submit">
            Topup
        </button>
    </form>
</div>

@endsection