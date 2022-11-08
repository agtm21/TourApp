<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="css/adminpage.css">
    <script src="https://kit.fontawesome.com/04c6e6ed2a.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    
    <title>Admin Page</title>
</head>
<body>
    <div class="main-container d-flex">
        <div class="sidebar" id="side_nav">
            <div class="header p-2 text-light">
                <h1 class="fs-1"> Dolphin Tour</h1>
                <h1 class="fs-3">Admin Page</h1>
            </div>
            <hr>
             <!-- Sidebar -->
        <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse">
          <div class="position-sticky">
            <div class="list-group list-group-flush mx-3 mt-4">
              <a
                href="#"
                class="list-group-item list-group-item-action py-2 ripple bg-dark text-light"
                aria-current="true">
                <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>Main dashboard</span>
              </a>
              <a href="#" class="list-group-item list-group-item-action py-2 ripple bg-dark text-light">
                <i class="fas fa-chart-area fa-fw me-3"></i><span>Database</span>
              </a>
              <div class="dropdown fixed-bottom">
                  <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownuser" data-bs-toogle="dropdownuser" aria-expanded="false">
                      <i class="fa-light fa-user" class="rounded-circle me-2" width="32" height="32"></i>
                      <Strong>User</Strong>
                  </a>
                  <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownuser" data-proper-placement="top-start" style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate(0px, -34px);">
                      <li>
                          <a class="dropdown-item" href="#">Profile</a>
                      </li>
                      <li>
                          <a class="dropdown-item" href="#">Logout</a>
                      </li>
                  </ul>
              </div>
            </div>
          </div>
        </nav>
    </div>
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col">
                <span class="fs-1">DATA USER</span>
              </div>
            </div>
          <div class="row">
            <div class="col-lg-3 col-6">
              <div class="small-box bg-info rounded shadow-sm">
                <div class="row">
                  <div class="col-md-8">
                <div class="inner">
                  <h3 class="fs-1 pt-3 fw-bold">1500</h3>
                  <p class="fs-5">Nelayan</p>
                </div>
              </div>
                <div class="col-md-4">
                <div class="icon pt-5">
                  <i class="fa-solid fa-database fa-5x"></i>
                </div>
              </div>
              </div>
                <a href="#" class="small-box-footer d-flex bd-highlight bg-primary p-2 text-light text-decoration-none rounded-bottom">
                  <span class="mx-auto">More info<i class="fas fa-arrow-circle-right mx-2"></i></span>
                </a>
              </div>
            </div>
            </div>
          </div>
        </div>
      </section>
</body>
</html>