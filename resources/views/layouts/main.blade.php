<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="css/homepage.css">
    <script src="https://kit.fontawesome.com/04c6e6ed2a.js" crossorigin="anonymous"></script>
  <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    <title>Dolphin Tour @isset($title){{ $title }}
        
    @endisset</title>
</head>
<body class="d-flex flex-column min-vh-100">
    {{-- Navigator bar --}}
    
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
              <a class="nav-link fs-4 mx-4" href="#">Penyewaan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link fs-4" href="#">About</a>
            </li>
          </ul>
            <div class="dropdown">
                <a class="nav-link dropdown-toggle" id="UserDropdown" href="#" data-bs-toggle="dropdown" aria-expanded="false">
                  <img class="img-xs rounded-circle mx-2" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="Profile image" height="30" width="30">{{ auth()->user()->username }}</a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="UserDropdown">
                  <div class="dropdown-header text-center">
                    {{-- @auth : ketika user login eksekusi kode berikut  --}}
                    @auth
                      <img class="img-md rounded-circle" src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="Profile image" width="100" height="100">
                      {{-- memanggil user yang telah terauth dari tabel user yang ada di database --}}
                      <p class="mb-1 mt-3 font-weight-semibold">{{ auth()->user()->username }}</p>
                      <p class="font-weight-light text-muted mb-0">{{ auth()->user()->email }}</p>    
                    @endauth
                  </div>
                  <a class="dropdown-item"><i class="fa-solid fa-user"></i> My Profile</a>
                  <a class="dropdown-item"><i class="fa-solid fa-cart-shopping"></i> My Order History</a>
                  <a class="dropdown-item"><i class="fa-solid fa-calendar-check"></i> Activity</a>
                  <a class="dropdown-item"><i class="fa-solid fa-circle-question"></i> FAQ</a>
                  <form action="/logout" method="POST">
                    @csrf
                    <button class="dropdown-item"><i class="fa-solid fa-right-from-bracket"></i>Sign Out</button>
                  </form>
                </div>
              </div>
          
          {{-- User Profile --}}
            {{-- <div class="dropdown" style="margin-left: 80%">
                <a href="#" class="dropdown-toggle" id="dropdownMenuButton1" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <img src="..." alt="..." width="30" height="30" class="rounded ">
                    User
                </a> 
                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a href="#" class="dropdown-item"><i>User Profile</i></a></li>
                    <li><a href="#" class="dropdown-item"><i>My Order History</i></a></li>
                    <li><a href="#" class="dropdown-item"><i>Notification</i></a></li>
                    <a href="/logout" class="dropdown-item"><i class="fa-solid fa-right-from-bracket"></i>Logout</a>
                </ul>
            </div> --}}
          {{-- End of User Profile --}}
        </div>
    </nav>
    {{-- End of navigator bar --}}
    {{-- search box --}}
    <div class="container my-5">
        <form class="d-flex">
            <div class="col">
                <div class="mb-3">
                    <label for="" class="form-label">Cari</label>
                    <input type="text" name="" id="" class="form-control" placeholder="" aria-describedby="helpId">
                    <small id="helpId" class="text-muted">Ketik nama ...</small>
                </div>
            </div>
        </form>
    </div>
    {{-- end of search box --}}

    {{-- packet list --}}
    <div class="container">
        <div class="fs-1 fw-bold">
            <p>Trend Spot</p>
        </div>
        @yield('packagelist')
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
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eveniet, nam, eos doloremque numquam ducimus ab sunt illo exercitationem sequi itaque pariatur qui at adipisci. Ipsam ratione praesentium voluptates provident minus!</p>
            </section>
            {{-- end of text section --}}
        </div>
        {{-- copyright --}}
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            ?? 2022 Copyright:
            <a class="text-white" href="#">Dolphintour.com</a>
        </div>
        
        {{-- end of copyright --}}
    </footer>
    {{-- end of footer --}}
</body>
</html>