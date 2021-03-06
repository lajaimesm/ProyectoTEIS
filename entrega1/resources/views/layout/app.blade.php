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
          <a class="nav-link active" href="{{ route('home.index') }}">{{__('homeLayout') }}</a>
          <div class="vr bg-white mx-2 d-none d-lg-block"></div>
          @guest
          <a class="nav-link active" href="{{ route('login') }}">{{__('loginUser') }}</a>
          <a class="nav-link active" href="{{ route('register') }}">{{__('registerUser') }}</a>
          
          @else
          <form id="logout" action="{{ route('logout') }}" method="POST">
            <a role="button" class="nav-link active"
               onclick="document.getElementById('logout').submit();">{{__('logOutUser') }}</a>
            @csrf
          </form>
          <a class="nav-link active" href="{{ route('vasitos.list') }}">{{__('vasitosList') }}</a>
          <a class="nav-link active" href="{{ route('wines.list') }}"> {{__('winesList') }}</a>
          <a class="nav-link active" href="{{ route('combos.list') }}"> {{__('combosList') }}</a>
          <a class="nav-link active" href="{{ route('orders.list') }}"> {{__('ordersList') }}</a>
          <a class="nav-link active" href="{{ route('vasitos.lowPrice') }}">{{__('lowPriceVasito') }}</a>
          <a class="nav-link active" href="{{ route('wines.highDiscount') }}">{{__('highDiscountWines') }}</a>
          <a class="nav-link active" href="{{ route('vasitos.searchPriceConsult') }}">{{__('searchVasitosPrices') }}</a>
          <a class="nav-link active" href="{{ route('wines.nameSearchConsult') }}">{{__('searchWinesNames') }}</a>
          <div class="vr bg-white mx-2 d-none d-lg-block"></div>
          <a class="nav-link active" href="{{ route('cart.index') }}">{{__('cart') }}</a>
          @endguest
          <div class="vr bg-white mx-2 d-none d-lg-block"></div>
          

        </div>
      </div>
    </div>
  </nav>

  <!-- header -->

  <div class="row">
    @yield('content')
  </div>

  <!-- footer -->
  <div class="copyright py-4 text-center text-white">
    <div class="container">
      <small>
        Copyright - <a class="text-reset fw-bold text-decoration-none" target="_blank">
          David Garcia, Camilo Ca??as, Luis Angel Jaimes y Daniel Correa
        </a>
      </small>
    </div>
  </div>
  <!-- footer -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
</body>
</html>