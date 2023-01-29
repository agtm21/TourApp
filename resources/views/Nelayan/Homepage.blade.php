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
</head>

<body>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-3 bg-dark p-3 vh-100">
                <!-- Your sidebar content here -->
                <h5 class="text-center">Dolphin Tour</h5>
                <!-- Some borders are removed -->
                <ul class="list-group list-group-flush ">

                    <a href="/nelayan/homepage" class="list-group-item bg-dark text-decoration-none text-white text-center">Dashboard </a>
                    <a href="#" class="list-group-item bg-dark text-decoration-none text-white text-center">Order </a>
                    
                </ul>
                <div class="d-flex justify-content-center">
                    @foreach ($users as $user)
                        
                    <div class="dropup-center dropup position-absolute bottom-0">
                        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            {{ $user->username }}
                        </button>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="/logout">Logout</a></li>
                            
                        </ul>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-9 p-3">
                <!-- Your main content here -->
                @yield('container')
                
            </div>

        </div>
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous">
        </script>
</body>

</html>