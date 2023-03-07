{{-- After Sign Up The Page Should be Go To Login Again --}}
@extends('layouts.sign',['title'=>'Sign In'])
@section('signin')

<section class="vh-100 gradient-form" style="background-color: #eee;">
    <div class="container h-100">
      
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          @if (session()->has('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              {{ session('success') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>    
          @endif
          @if (session()->has('loginerror'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
              {{ session('loginerror') }}
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>    
          @endif
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              {{-- from here the form board --}}
              
              <div class="col-lg-6">
                
                <div class="card-body p-md-5 mx-md-4">
  
                  <div class="text-center">
                    <a href="/"><img src="{{ URL::asset('img/logo.png') }}"
                      style="width: 185px;" alt="logo"></a>
                    <h4 class="mt-1 mb-5 pb-1">Dolphin Tour</h4>
                  </div>
  
                  <form action="/login" method="POST">
                  @csrf
                    <div class="form-outline mb-4">
                        <label class="form-label" for="username">Username</label>
                        <input type="username" id="username" name="username" class="form-control" @error('username') is-invalid @enderror placeholder="Username" />
                        @error('username')
                            <div class="text-danger" id="username">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" id="password" name="password" class="form-control" @error('password') is-invalid @enderror placeholder="Password">
                        @error('password')
                            <div class="text-danger" id="password">{{ $message }}</div>
                        @enderror
                    </div>
  
                    <div class="text-center pt-1 mb-5 pb-1">
                      <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 btn-lg" type="submit">Log
                        in</button> <br>
                      <a class="text-muted" href="#!">Forgot password?</a>
                    </div>
  
                    <div class="d-flex align-items-center justify-content-center">
                      <p class="mb-0 me-2">Don't have an account?</p>
                      <a href="/signup">Sign Up</a>
                    </div>
                    
                  </form>
  
                </div>
              </div>
              {{-- masuk img --}}
              <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="{{ asset('img/login-img.jpeg') }}"
                  alt="Login image" class="w-100 h-100" style="object-fit: cover; object-position: left;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

