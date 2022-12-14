<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    {{-- <link rel="stylesheet" href="css/homepage.css"> --}}
    <script src="https://kit.fontawesome.com/04c6e6ed2a.js"crossorigin="anonymous"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>      
    
    {{-- <link rel="stylesheet" href="css/adminpage.css"> --}}
    <title>Admin Page | @isset($title){{ $title }}@endisset</title>
</head>
<body>
 
    <div class="main-container d-flex">
      <div class="sidebar bg-dark vh-100 w-25" id="side_nav">
        <div class="header p-2 text-light">
          <h1 class="fs-1"> Dolphin Tour</h1>
          <h1 class="fs-3">Admin Page</h1>
        </div>
        <hr>
            {{-- sidebar --}}
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse">
          <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-4">
              <a href="/adminpage" class="list-group-item list-group-item-action py-2 ripple bg-dark text-light" aria-current="true">
                <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
              </a>
              <button class="list-group-item list-group-item-action py-2 ripple bg-dark text-light" type="button" data-bs-toggle="collapse" data-bs-target="#collapseWidthExample" aria-expanded="false" aria-controls="collapseWidthExample">
                <i class="fas fa-chart-area fa-fw me-3"></i><span>Database</span>
              </button>
              <div class="collapse collapse-horizontal" id="collapseWidthExample">
                <a href="/datauser" class="text-decoration-none text-light" style="margin-left:53px"><i class="fa-solid fa-user fa-0.5x"></i>Data User</a>
              </div>
              {{-- <div class="list-group-item list-group-item-action py-2 ripple bg-dark text-light">
                <li>Something</li>
              </div> --}}
              <!-- Default dropup button -->
              <div class="dropup-center dropup fixed-bottom m-4 ps-4">
                <a class="btn dropdown dropdown-toggle text-light text-decoration-none" data-bs-toggle="dropdown" aria-expanded="false">
                  <img src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="Profile Image" class="rounded-circle" width="30" height="30"> 
                  <span class="ps-2">Admin</span>
                  
                  {{-- {{ auth()->user()->username }} --}}
                </a>
                <div class="dropdown-menu">
                  <a class="dropdown-item" href="/profile">Profile</a>
                  <form action="/logout" method="POST">
                    @csrf
                    <button class="dropdown-item">Sign out</button>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </nav>
        {{-- end of sidebar --}}
      </div>
        <section class="content w-100">
          <div class="container-fluid">
            @if (session()->has('success'))
              <div class="alert alert-success alert-dismissible fade show mx-2 my-2 col-md-8 text-center" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            @error('error')
                <div class="alert alert-danger alert-dismissible fade show mx-2 my-2 col-md-8 text-center" role="alert">
                  {{ session('error') }}
                  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror
          </div>
          @yield('content')
          @yield('profile')
          @yield('datauser')
        </section>
    </div>
</body>
</html>