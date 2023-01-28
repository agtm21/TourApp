@extends('Adminlayouts.adminmain',['title'=>'Edit Package'])
@section('content')
<div class="container">
    <div class="mb-4 mt-4">
        <div class="my-2">
            <a href="{{ URL::previous() }}" class="btn btn-outline-info">
                <i class="fa-solid fa-arrow-rotate-left"></i>
            </a>
        </div>
        <div class="d-flex flex-row">
            <i class="fa-solid fa-box-archive fa-2x"></i>
            <h1>Edit Package</h1>
        </div>
    </div>
    <div class="col-md-7">
        <form action="#" method="#">
            {{-- @csrf --}}
            {{-- product name --}}
            <div class="mb-3">
              <label for="productname1" class="form-label">Product Name</label>
              <input type="email" class="form-control" id="productname1" aria-describedby="productnameHelp">
            </div>
            <div class="mb-3">
                <label for="formFile" class="form-label">Product Image</label>
                <input class="form-control" type="file" id="formFile">
              </div>
              {{-- description --}}
            <div class="mb-3">
              <label for="productdesc1" class="form-label">Product Description</label>
              <input type="textarea" class="form-control" id="productdesc1">
            </div>
            {{-- price --}}
            <label for="price1" class="form-label">Price</label>
            <div class="input-group mb-3">
                <span class="input-group-text">Rp</span>
                <input type="text" class="form-control" aria-label="Amount (to the nearest rupiah)">
                <span class="input-group-text">.00</span>
            </div>
            {{-- Date --}}
            <div class="mb-3">
                <label for="time" class="form-label">Choose Date</label>
                <input type="date" name="date" id="date" class="form-control">
            </div>
            {{-- Time --}}
            <label for="time" class="form-label">Choose Time</label>
            <div class="row">
                <div class="col col-sm-2">
                    <p>from</p>
                </div>
                <div class="col">
                    <div class="input-group mb-3">
                        <input type="time" class="form-control" id="timepicker">
                        
                    </div>
                </div>
                <div class="col col-sm-2 text-center">
                    <p>to</p>
                </div>
                <div class="col">
                    <div class="input-group mb-3">
                        <input type="time" class="form-control" id="timepicker">
                    </div>
                </div>
                
            </div>
          
            {{-- button --}}
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
    </div>
</div>
    {{-- <form action="#" method="post">
        <input type="text" name="product_name" id="product_name">
        <input type="text" name="upload_file" id="upload_file">
        <input type="button" value="Upload File">
        <input type="text" name="product_desc" id="product_desc">
        <input type="number" name="price" id="price">
        <input type="time" name="from" id="from">
        <input type="time" name="to" id="to">
        <input type="date" name="date" id="date">
    </form> --}}
@endsection