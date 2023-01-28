@extends('layouts.sign',['title'=>'Sign Up'])
@section('signup')
<section class="vh-100 gradient-form" style="background-color: #eee;">
    <div class="container h-100">
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
                    <h4 class="mt-1 mb-2">Tour App</h4>
                  </div>
  
                  <form action="/register" method="POST">
                    {{-- CSRF: Protection From Laravel (Read Documentation For Details!) --}}
                    @csrf
                    <input type="hidden" id="role" value="traveler" name="role">
                    <div class="form-outline mb-4">
                        <label class="form-label" for="username">Username</label>
                        <input type="text" name ="username" id="username" class="form-control" placeholder="Username" @error('username') is-invalid @enderror value = "{{ old('username') }}" />
                        @error('username')
                            <div class="text-danger" id="username">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="email">Email</label>
                        <input type="email" name ="email" id="email" class="form-control"
                        placeholder="Email" @error('username') is-invalid @enderror value = "{{ old('email') }}" />
                        @error('email')
                            <div class="text-danger" id="email">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" name ="password" id="password" class="form-control" placeholder="Password" @error('username') is-invalid @enderror>
                        @error('password')
                            <div class="text-danger" id="password">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-outline mb-4 text-center">
                      <button class="btn btn-primary btn-block fa-lg gradient-custom-2  btn-lg" type="submit">Sign Up</button>
                    </div>
                    <div class="d-flex align-items-center justify-content-center ">
                      <p class="mb-0 me-2">Already have an account?</p>
                      <a href="/signin">@lang('pages.sign.traveler')</a>
                    </div>
                  </form>
  
                </div>
              </div>
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