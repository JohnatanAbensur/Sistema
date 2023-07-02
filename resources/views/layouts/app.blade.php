<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @stack('styles')
</head>
<body>
    <header>
        <div class="container-fluid bg-body-tertiary d-flex align-items-center px-md-5">
            <div class="row">
              <div class="col-md-auto col-12 small mb-2 mb-md-0">
                <i class="fa-solid fa-phone me-2"></i><span>123-456-7890</span>
              </div>
              <div class="col-md-auto col-12 small mb-2 mb-md-0">
                <i class="fa-solid fa-envelope me-2"></i><span>info@example.com</span>
              </div>
              <div class="col-md-auto col-12 small">
                <i class="fa-solid fa-location-dot me-2"></i><span>San José</span>
              </div>
            </div>
        </div>
        <div class="container-fluid bg-body-tertiary">
            <div class="row d-flex justify-content-center">
              <div class="col-md-6 col-12 m-2">
                <div class="text-center"><img src="../image/angel.png" alt="" style="width: 100px"></div>
                <form class="d-flex position-relative" role="search">
                  <input class="form-control text-center" type="search" placeholder="¿Qué buscamos hoy?" aria-label="Search">
                  <button class="btn btn-outline-success position-absolute top-0 end-0" type="submit"><i class="fa-solid fa-magnifying-glass"></i></button>
                </form>
              </div>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container-fluid px-md-5">
              <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
              </button>
              <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"><i class="fa-solid fa-blender-phone me-2"></i>Electrodomésticos</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"><i class="fa-solid fa-shirt me-2"></i>Ropas</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#"><i class="fa-solid fa-mobile-screen me-2"></i>Celulares</a>
                  </li>
                </ul>
              </div>
            </div>
        </nav>
    </header>
    <main class="m-5">
        @yield('main')
    </main>
    <footer>

    </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js" integrity="sha512-fD9DI5bZwQxOi7MhYWnnNPlvXdp/2Pj3XSTRrFs5FQa4mizyGLnJcN6tuvUS6LbmgN1ut+XGSABKvjN0H6Aoow==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    @stack('scripts')
</body>
</html>