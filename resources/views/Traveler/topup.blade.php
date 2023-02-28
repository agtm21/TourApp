@extends('layouts.main',['title'=>'Topup'])
@section('topup')
{{-- @if (session()->has('success'))
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
      @endif --}}

<div class="container-fluid">
    <h1 class="mb-3">Topup Sail-pay</h1>
    <div class="card mb-3">
        <div class="d-flex ms-3">
          <div class="fs-1">1</div>
          <img src="img/SailCoin.png" class="mt-3 me-1" alt="Title" width="30px" height="30">
          <div class="fs-1 me-3">Sailpay</div>
          <div class="fs-1"> = 1 IDR</div>
        </div>
        <div class="card-body">
            <p class="card-text">Saldo: Rp. {{ $balance }}</p>
        </div>
    </div>
    <form action="/prosesTopup" method="post">
        @csrf
        <input type="text" name="amount" id="amount" class="form-control mb-3" placeholder="example: 10.000">
        <div class="d-flex align-items-center  mb-3">
            <span class="me-2">
                Currency:
            </span>
            <select class="form-select" style="width:100px" name="select">
                
                <option  value="usd">USD</option>
                <option selected value="idr">IDR</option>
                
              </select>
          </div>
        <div class="d-flex align-items-center mb-3">
          <span class="me-3">Virtual Account:</span>
          <b id="virtualaccountnumber">
            {{ $generate }}
          </b>
          <button class="btn btn-outline-info ms-4" id="copynumber" type="button" role="button" onclick="copyToClipboard()">
            Copy
          </button>
        </div>
          
        <p>Transfer pada Virtual Account di atas sesuai nominal yang tertera sebelum melanjutkan pesanan anda.</p>
        <button class="btn btn-info mb-3" type="submit" role="submit">
            Topup
        </button>
    </form>
</div>
<script>
function copyToClipboard() {
  var text = document.getElementById("virtualaccountnumber").textContent;
  navigator.clipboard.writeText(text).then(function() {
    console.log("Text copied to clipboard");
  }, function() {
    console.error("Error copying text to clipboard");
  });
}
</script>
@endsection