<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="css/homepage.css"> --}}
    <script src="https://kit.fontawesome.com/04c6e6ed2a.js" crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
    </script>
    <title>Dolphin Tour @isset($title){{ $title }}

        @endisset</title>
</head>

<body class="d-flex flex-column min-vh-100">
    {{-- Navigator bar --}}

    {{-- <nav class="navbar navbar-expand-xl navbar-dark bg-dark">
        <a class="navbar-brand ms-5" href="/homepage">
            <img src="img/dolphinlogo.jpg" alt="dolphin-logo" class="d-inline-block" width="30" height="30">
            Dolphin Tour
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse ms-4" id="navbarNav" style="margin-right: 90px;">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0">
            <li class="nav-item active">
              <a class="nav-link fs-4" href="/homepage">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-4 mx-4" href="/penyewaan">Penyewaan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-4" href="#">About</a>
            </li>
          </ul>
            <div class="dropdown">
                <a class="nav-link dropdown-toggle text-light" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                  <img class="img-xs rounded-circle mx-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="Profile image" height="30" width="30">{{ auth()->user()->username }}</a>
    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
        <div class="dropdown-header text-center">

            @auth
            <img class="img-md rounded-circle" src="http://bootdey.com/img/Content/avatar/avatar1.png"
                alt="Profile image" width="100" height="100">

            <p class="mb-1 mt-3 font-weight-semibold ">{{ auth()->user()->username }}</p>
            <p class="font-weight-light text-muted mb-0">{{ auth()->user()->email }}</p>
            @endauth
        </div>
        <a class="dropdown-item " href="/profile/user"><i class="fa-solid fa-user"></i> My Profile</a>
        <a class="dropdown-item"><i class="fa-solid fa-cart-shopping"></i> My Order History</a>
        <a class="dropdown-item"><i class="fa-solid fa-calendar-check"></i> Activity</a>
        <a class="dropdown-item"><i class="fa-solid fa-circle-question"></i> FAQ</a>
        <form action="/logout" method="POST">
            @csrf
            <button class="dropdown-item"><i class="fa-solid fa-right-from-bracket"></i>Sign Out</button>
        </form>
    </div>
    </div>



    </div>
    </nav> --}}
    {{-- End of navigator bar --}}
    <nav class="navbar navbar-expand-lg bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/homepage"><img src="img/dolphinlogo.jpg" alt="dolphin-logo"
                    class="d-inline-block" width="30" height="30"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link text-light" aria-current="page" href="/homepage">@lang('pages.home')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/penyewaan">@lang('pages.book')</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-light" href="/history">History</a>
                    </li>
                    {{-- <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Dropdown
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="#">Action</a></li>
                <li><a class="dropdown-item" href="#">Another action</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">Something else here</a></li>
              </ul>
            </li> --}}
                    <li class="nav-item">
                        <a class="nav-link text-light" href="#">@lang('pages.about')</a>
                    </li>
                </ul>
                <div class="dropdown me-2">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <i class="fa fa-globe"></i> {{ strtoupper(session('locale') ?? config('app.locale')) }}
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="{{ url('langs/en') }}">English</a></li>
                        <li><a class="dropdown-item" href="{{ url('langs/id') }}">Bahasa</a></li>

                    </ul>
                </div>
                <div class="dropdown me-4">
                    <a class="nav-link dropdown-toggle text-light" id="UserDropdown" href="#" data-bs-toggle="dropdown"
                        aria-expanded="false">
                        <img class="img-xs rounded-circle mx-2" src="http://bootdey.com/img/Content/avatar/avatar1.png"
                            alt="Profile image" height="30" width="30">{{ auth()->user()->username }}</a>
                    <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                        <div class="dropdown-header text-center">

                            @auth
                            <img class="img-md rounded-circle" src="http://bootdey.com/img/Content/avatar/avatar1.png"
                                alt="Profile image" width="100" height="100">

                            <p class="mb-1 mt-3 font-weight-semibold ">{{ auth()->user()->username }}</p>
                            <p class="font-weight-light text-muted mb-0">{{ auth()->user()->email }}</p>
                            <p>Balance: {{ auth()->user()->currency }} Sail-Pay</p>
                            
                            @endauth
                        </div>
                        <a class="dropdown-item " href="/profile/user"><i class="fa-solid fa-user"></i> @lang('auth.profile.profil')</a>
                        <a class="dropdown-item"><i class="fa-solid fa-cart-shopping"></i> @lang('auth.profile.history')</a>
                        <a class="dropdown-item"><i class="fa-solid fa-calendar-check"></i> @lang('auth.profile.activities')</a>
                        <a class="dropdown-item"><i class="fa-solid fa-circle-question"></i> @lang('auth.profile.faq')</a>
                        <a class="dropdown-item" href="/topup"><i class="fa-solid fa-money-check-dollar"></i> Topup</a>
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="dropdown-item"><i class="fa-solid fa-right-from-bracket"></i>@lang('auth.profile.out')</button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
        </div>
    </nav>

    {{-- packet list --}}
    <div class="container">
        <div class="mt-5"></div>
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
        @yield('packagelist')
        @yield('container')
    </div>
    {{-- end of packet list --}}
    {{-- <div class="container">
        <div class="dropdown">
            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
              Dropdown button
            </button>
            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
              <li><a class="dropdown-item" href="#">Action</a></li>
              <li><a class="dropdown-item" href="#">Another action</a></li>
              <li><a class="dropdown-item" href="#">Something else here</a></li>
            </ul>
          </div>
    </div> --}}
    {{-- footer --}}
    <footer class="footer mt-auto bg-dark text-center text-light">
        <div class="container p-4">
            {{-- social media --}}
            <section class="mb-4">
                <a href="#" class="mx-2">
                    <i class="fa-brands fa-facebook fa-2x"></i>
                </a>
                <a href="#">
                    <i class="fa-brands fa-twitter fa-2x"></i>
                </a>
                <a href="#" class="mx-2">
                    <i class="fa-brands fa-instagram fa-2x"></i>
                </a>
            </section>
            {{-- end of social media --}}
            {{-- text section --}}
            <section class="mb-4">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, nam, eos doloremque numquam ducimus
                    ab sunt illo exercitationem sequi itaque pariatur qui at adipisci. Ipsam ratione praesentium
                    voluptates provident minus!</p>
            </section>
            {{-- end of text section --}}
        </div>
        {{-- copyright --}}
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            © 2022 Copyright:
            <a class="text-white" href="#">Dolphintour.com</a>
        </div>

        {{-- end of copyright --}}
    </footer>
    {{-- end of footer --}}
</body>

</html>