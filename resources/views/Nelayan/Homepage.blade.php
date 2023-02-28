<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Nelayan | {{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/sidebarnel.css') }}">
    <script src="https://kit.fontawesome.com/04c6e6ed2a.js" crossorigin="anonymous"></script>
    <script src="https:://code.jquery.com/jquery-3.6.0.min.js"></script>
    
</head>

<body>
    <div class="container-fluid">
        
        <div class="row">
            
            <div class="col-md-3 bg-dark p-3 vh-100">
                
                <button class="btn btn-dark w-100 border-none p-4" type="button" data-bs-toggle="collapse" data-bs-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    <img src="http://bootdey.com/img/Content/avatar/avatar1.png" width="30px" height="30px" class="rounded-circle" alt="gambar-user">
                    <span class="text-light ms-2">
                        
                        {{ auth()->user()->username }}
                    </span>
                  </button>
                  <div class="collapse text-center" id="collapseExample">
                    <div class="list-group list-group-flush ">

                        <a href="/profile/nelayan" class="list-group-item text-light bg-dark " >Profile</a>
                        <a href="/logout" class="list-group-item text-light bg-dark">Logout</a>
                        <a href="#" class="list-group-item text-light bg-dark"></a>
                    </div>
                  </div>
                  
                
                <hr>
                <div class="list-group list-group-flush ">

                    <a href="/nelayan/homepage" class="list-group-item bg-dark text-decoration-none text-white text-center">Dashboard </a>
                    <a href="/nelayan/order" class="list-group-item bg-dark text-decoration-none text-white text-center">Order </a>
                    
                </div>
                
            </div>
            <div class="col-md-9 p-3">
                <!-- Your main content here -->
                @yield('container')
                @yield('profile')
            </div>

        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
</body>

</html>