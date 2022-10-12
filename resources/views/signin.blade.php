{{-- After Sign Up The Page Should be Go To Login Again --}}
@extends('layouts.sign',['title'=>'Sign In'])
@section('signin')
<section class="vh-100 gradient-form" style="background-color: #eee;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-xl-10">
          
          <div class="card rounded-3 text-black">
            <div class="row g-0">
              {{-- from here the form board --}}
              
              <div class="col-lg-6">
                
                <div class="card-body p-md-5 mx-md-4">
  
                  <div class="text-center">
                    <a href="/"><img src="img/dolphinlogo.jpg"
                      style="width: 185px;" alt="logo"></a>
                    <h4 class="mt-1 mb-5 pb-1">Tour App</h4>
                  </div>
  
                  <form>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example11">Email</label>
                        <input type="email" id="form2Example11" class="form-control"
                        placeholder="Email" />
                    </div>
                    <div class="form-outline mb-4">
                        <label class="form-label" for="form2Example22">Password</label>
                        <input type="password" id="form2Example22" class="form-control" placeholder="Password">
                    </div>
  
                    <div class="text-center pt-1 mb-5 pb-1">
                      <button class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3 btn-lg" type="button">Log
                        in</button> <br>
                      <a class="text-muted" href="#!">Forgot password?</a>
                    </div>
  
                    <div class="d-flex align-items-center justify-content-center pb-4">
                      <p class="mb-0 me-2">Don't have an account?</p>
                      <a href="/signup">Sign Up</a>
                    </div>
  
                  </form>
  
                </div>
              </div>
              {{-- masuk img --}}
              <div class="col-sm-6 px-0 d-none d-sm-block">
                <img src="img/images.jpg"
                  alt="Login image" class="w-100 h-100" style="object-fit: cover; object-position: left;">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection

