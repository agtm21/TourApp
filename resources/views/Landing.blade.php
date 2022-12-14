<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dolphin Tour</title>
    <link rel="stylesheet" href="css/homecss.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <script src="https://kit.fontawesome.com/04c6e6ed2a.js" crossorigin="anonymous"></script>
  </head>
  <body>
    {{-- Navigation Bar --}}
    <nav class="navbar navbar-expand-lg bg-dark">
      <div class="container-fluid">
        <a class="navbar-brand text-light" href="/"><img src="img/dolphinlogo.jpg" alt="logo" width="30" height="24" style="margin-right:10px;">Dolphin Tour</a>
        <div class="me-5">
          <a href="signin" class="px-2"><button type="button" class="btn btn-warning rounded ms-1"><i class="fa-solid fa-right-to-bracket"></i>
            Sign In</button></a>
        </div>
      </div>
    </nav>
    {{-- <nav class="navbar navbar-expand-lg bg-dark fixed-top">
      <div class="container-fluid">
        <a class="navbar-brand text-light mx-5" href="/"><img src="img/dolphinlogo.jpg" alt="logo" width="30" height="24" style="margin-right:10px;">Dolphin Tour</a>
          <div class="me-5">
            <a href="signin" class="px-2"><button type="button" class="btn btn-warning rounded ms-1"><i class="fa-solid fa-right-to-bracket"></i>
              Sign In</button></a>
            
        </div>
      </div>
    </nav> --}}
    {{-- End Of Navbar --}}


    {{-- Content --}}
   <div class="text-light">
      <div class="container" id="content">
        <div class="row mt-4">
          <div class="col col-md-6">
            <h1 class="fs-2 mb-4">Sail With Us!</h1>  
            <h4 class="fs-5">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis voluptatem alias, eaque sit error illum necessitatibus voluptatibus aut, quidem ullam non in facilis earum vero iure inventore sed. Eaque, quibusdam?</h3>
              <div class="container text-center " id="buttoncontent">
                <div class="row row-cols-auto text-center">
                  <div class="col">
                    <a href="/signup" class="btn btn-warning "><i class="fa-solid fa-user-plus pe-2"></i>Sign Up As Traveler</a> 
                  </div>
                  <div class="col">
                    <span class="fs-3 p-2">or</span>        
                  </div>
                  <div class="col">
                    <a href="/signupnel" class="btn btn-warning "><i class="fa-solid fa-user-plus pe-2"></i>Sign Up As Fisherman</a> 
                  </div>
                </div>
              </div>
          </div>
          <div class="col col-md-2"></div>
          <div class="col col-md-4">
            <div class="img">
              <img src="img/dillus.jpg"  class="img-fluid rounded float-end" alt="dolphin-img-landingpage" width="300" height="300">
            </div>
          </div>
        </div>
      </div>
    {{-- <div class="row">
      <div class="col">
        <div class="float-start" id="text-left">
          <h1 class="fs-1 pb-2">Sail With Us!</h1>  
          <h3 class="fs-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Veritatis voluptatem alias, eaque sit error illum necessitatibus voluptatibus aut, quidem ullam non in facilis earum vero iure inventore sed. Eaque, quibusdam?</h3>
          <a href="/signup" class="btn btn-warning mt-4 fs-3">Daftar Sebagai Tamu</a> 
          <span class="fs-3 p-2">atau</span>
          <a href="/signupnel" class="btn btn-warning mt-4 fs-3">Daftar Sebagai Nelayan</a>  
        </div>   
        
      </div>
      <div class="col">
        <div class="float-end" id="img-right">
          <div class="img">
            <img src="img/dillus.jpg"  class="img-thumbnail rounded" alt="dolphin-img-landingpage">
          </div>
        </div>
      </div>
    </div> --}}
   </div>

   
    {{-- Bootstrap JavaScript --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>