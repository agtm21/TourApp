@extends('layouts.main',['title'=>'Topup'])
@section('container')
    <div class="container-fluid">
        <h1 class="mb-3">Topup Sail-pay</h1>
        <div class="card mb-3">
            <img class="card-img-top" src="holder.js/100x180/" alt="Title">
            <div class="card-body">
                <p class="card-text">Saldo: Rp. 0</p>
            </div>
        </div>
        <input type="text" name="amount" id="amount" class="form-control mb-3">
        <div class="d-flex mb-3">
            <button class="btn btn-outline-info me-3">50 Rb</button>
            <button class="btn btn-outline-info me-3">100 Rb</button>
            <button class="btn btn-outline-info me-3">150 Rb</button>
            <button class="btn btn-outline-info me-3">200 Rb</button>
        </div>
        <div class="form-check mb-3">
            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
            <label class="form-check-label" for="flexRadioDefault1">
                Bank
            </label>
        </div>
        <div class="form-check mb-3">

            <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2">
            <label class="form-check-label" for="flexRadioDefault2">
                Paypal
            </label>
        </div>
        <button class="btn btn-info mb-3">
            Topup
        </button>
    </div>
@endsection