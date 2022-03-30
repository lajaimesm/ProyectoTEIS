<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
  <link href="{{ asset('/css/app.css') }}" rel="stylesheet" />
  <title>@yield('title', 'Vasitos')</title>
</head>
<body>
  <!-- header -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-secondary py-4">
    <div class="container">
      <a class="navbar-brand" href="{{ route('home.index') }}">Vasito</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup"
        aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav ms-auto">
          <a class="nav-link active" href="{{ route('home.index') }}">{{__('Home') }}</a>
          <div class="vr bg-white mx-2 d-none d-lg-block"></div>
          @guest
          <a class="nav-link active" href="{{ route('login') }}">Login</a>
          <a class="nav-link active" href="{{ route('register') }}">Register</a>
          
          @else
          <form id="logout" action="{{ route('logout') }}" method="POST">
            <a role="button" class="nav-link active"
               onclick="document.getElementById('logout').submit();">Logout</a>
            @csrf
          </form>
          <a class="nav-link active" href="{{ route('user_vasitos.list') }}">Vasitos</a>
          <a class="nav-link active" href="{{ route('user_wines.list') }}">Wines</a>
          <a class="nav-link active" href="{{ route('cart.index') }}">Cart</a>
          <a class="nav-link active" href="{{ route('vasitos.lowPrice') }}">Low Price Vasito</a>
          <a class="nav-link active" href="{{ route('wines.highDiscount') }}">High Discount Wines</a>
          @endguest
          <div class="vr bg-white mx-2 d-none d-lg-block"></div>
          

        </div>
      </div>
    </div>
  </nav>
  <h6>Search Wines Names</h6>
  <div class="input-group rounded">
    <form action="{{ route('wines.nameSearch') }}" method="GET">
      <input type="text" placeholder="Enter your search" name="search" aria-describedby="search-addon" required/>
      <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i></button>
    </form>
  </div>

  <div>
  <h6>Search Vasitos Prices</h6>
  <form action="{{ route('vasitos.searchPrice') }}" method="GET">
    <input type="numeric" name="min" placeholder="Minimun" required/>
    <input type="numeric" name="max" placeholder="Maximun" required/>
    <button type="submit"><i class="fa fa-search"></i></button>
  </form>
  </div>

  <!-- header -->

  <div class="container my-4">
    @yield('content')
  </div>

  <!-- footer -->
  <div class="copyright py-4 text-center text-white">
    <div class="container">
      <small>
        Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank">
          David Garcia, Camilo Cañas, Luis Angel Jaimes y Daniel Correa
        </a>
      </small>
    </div>
  </div>
  <!-- footer -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
</body>
</html>