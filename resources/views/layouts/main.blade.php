<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dolphin Tour</title>
    <link rel="stylesheet" href="css/homecss.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>
    {{-- Navigation Bar --}}
    

    <nav class="navbar navbar-expand-lg bg-info">
      <div class="container-fluid">
        
        <a class="navbar-brand" href="/"><img src="img/dolphinlogo.jpg" alt="logo" width="30" height="24" style="margin-right:10px;">Dolphin Tour</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="/">Home</a>
            <a class="nav-link" href="#">Features</a>
            <a class="nav-link" href="#">Pricing</a>
          </div>
          <div class="float-end ">
            <a href="signin"><button type="button" class="btn btn-primary ms-1">Sign In</button></a>
            <a href="signup"><button type="button" class="btn btn-primary">Sign Up</button></a>
          </div>
        </div>
      </div>
    </nav>
    {{-- carousel --}}
   <div class="px-wide">
    <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner mt-0" style="height:500px;">
        <div class="carousel-item active">
          <img src="img/slide1.jpg  " class="d-block w-100 h-50" alt="...">
        </div>
        <div class="carousel-item">
          <img src="img/slide2.jpg" class="d-block w-100 h-50" alt="...">
        </div>
        <div class="carousel-item">
          <img src="img/slide3.jpg" class="d-block w-100 h-50" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>
  
    <div data-bs-spy="scroll" data-bs-target="#navbar-example2" data-bs-root-margin="0px 0px -40%" data-bs-smooth-scroll="true" class="scrollspy-example bg-light p-3 rounded-2" tabindex="0">
     <div class="container mt-5 mb-5">
      <div class="row">
        <p><h2 style="text-align: center;">First Content</h2></p>

        <div class="col">
            <h4 id="scrollspyHeading1">First heading</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi sint ratione pariatur veniam amet unde est vitae officiis beatae iste totam odit, non eaque, quaerat cum aspernatur voluptates, ex magni.</p>
        </div>  
        <div class="col">
            <h4 id="scrollspyHeading2">Second heading</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil repellat possimus veritatis natus consequuntur suscipit expedita voluptatibus fugiat earum enim id quisquam quas totam, beatae excepturi voluptas facilis minima commodi?</p>
          </div> 
          <div class="col">
            <h4 id="scrollspyHeading3">Third heading</h4>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos, maxime earum. Labore ipsam, qui adipisci, cum repellendus voluptatum nobis minima veritatis aut iste unde voluptate enim harum nostrum ducimus? Eveniet.</p>   
          </div>
        </div>  
        </div>
      </div>
    </div>
    <div class="container mt-5 mb-5">
      <div class="row">
        <p><h2 style="text-align: center;">First Content</h2></p>
        
        <div class="col">
            <h4 id="scrollspyHeading1">First heading</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi sint ratione pariatur veniam amet unde est vitae officiis beatae iste totam odit, non eaque, quaerat cum aspernatur voluptates, ex magni.</p>
        </div>  
        <div class="col">
            <h4 id="scrollspyHeading2">Second heading</h4>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nihil repellat possimus veritatis natus consequuntur suscipit expedita voluptatibus fugiat earum enim id quisquam quas totam, beatae excepturi voluptas facilis minima commodi?</p>
          </div> 
          <div class="col">
            <h4 id="scrollspyHeading3">Third heading</h4>
            <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quos, maxime earum. Labore ipsam, qui adipisci, cum repellendus voluptatum nobis minima veritatis aut iste unde voluptate enim harum nostrum ducimus? Eveniet.</p>   
          </div>
        </div>  
        </div>
      </div>
      {{-- Main Page (Container) using template engine Laravel --}}
    <div class="container">
        @yield('container')
    </div>

    <!-- Footer -->
<footer class="bg-dark text-center text-white">
  <!-- Grid container -->
  <div class="container p-4">
    <!-- Section: Social media -->
    <section class="mb-4">
      <!-- Facebook -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-facebook-f"></i
      ></a>

      <!-- Twitter -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-twitter"></i
      ></a>

      <!-- Google -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-google"></i
      ></a>

      <!-- Instagram -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-instagram"></i
      ></a>

      <!-- Linkedin -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-linkedin-in"></i
      ></a>

      <!-- Github -->
      <a class="btn btn-outline-light btn-floating m-1" href="#!" role="button"
        ><i class="fab fa-github"></i
      ></a>
    </section>
    <!-- Section: Social media -->

    

    <!-- Section: Text -->
    <section class="mb-4">
      <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt distinctio earum
        repellat quaerat voluptatibus placeat nam, commodi optio pariatur est quia magnam
        eum harum corrupti dicta, aliquam sequi voluptate quas.
      </p>
    </section>
    <!-- Section: Text -->

    <!-- Section: Links -->
    <section class="">
      <!--Grid row-->
      <div class="row">
        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Link 1</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 2</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 3</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 4</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Link 1</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 2</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 3</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 4</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Link 1</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 2</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 3</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 4</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->

        <!--Grid column-->
        <div class="col-lg-3 col-md-6 mb-4 mb-md-0">
          <h5 class="text-uppercase">Links</h5>

          <ul class="list-unstyled mb-0">
            <li>
              <a href="#!" class="text-white">Link 1</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 2</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 3</a>
            </li>
            <li>
              <a href="#!" class="text-white">Link 4</a>
            </li>
          </ul>
        </div>
        <!--Grid column-->
      </div>
      <!--Grid row-->
    </section>
    <!-- Section: Links -->
  </div>
  <!-- Grid container -->

  <!-- Copyright -->
  <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
    © 2020 Copyright:
    <a class="text-white" href="https://mdbootstrap.com/">MDBootstrap.com</a>
  </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
    {{-- Bootstrap JavaScript --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>