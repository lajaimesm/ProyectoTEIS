<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />
  <title>@yield('title', 'Admin - Online Store')</title>
</head>

<body>
  <div class="row g-0">
    <!-- sidebar -->
    <div class="col-md-3
     p-3 col fixed text-white bg-dark">
      <a href="{{ route('layout.admin') }}" class="text-white text-decoration-none">
        <span class="fs-4">{{__('adminPanel') }}</span>
      </a>
      <hr />
      <ul class="nav flex-column">
        <li><a href="{{ route('admin.vasitos.register')}}" class="nav-link text-white">- {{__('registerVasitos') }}</a></li>
        <li><a href="{{ route('admin.wines.register')}}" class="nav-link text-white">- {{__('registerWines') }}</a></li>
        <li><a href="{{ route('admin.combos.register')}}" class="nav-link text-white">- {{__('registerCombos') }}</a></li>
        <li><a href="{{ route('admin.vasitos.list')}}" class="nav-link text-white">- {{__('vasitosList') }}</a></li>
        <li><a href="{{ route('admin.wines.list')}}" class="nav-link text-white">- {{__('winesList') }}</a></li>
        <li><a href="{{ route('admin.combos.list')}}" class="nav-link text-white">- {{__('combosList') }}</a></li>
        <li>
          <a href="{{ route('home.index') }}" class="mt-2 btn bg-primary text-white">{{__('goBack') }}</a>
        </li>
      </ul>
    </div>
    <!-- sidebar -->
    <div class="col content-grey">
      <nav class="p-6 shadow text-end">
      <form id="logout" action="{{ route('logout') }}" method="POST">
        <img class="img-profile rounded-circle" height="30" width="30" src="{{ asset('/img/Messias.jpg') }}">
        <span class="profile-font">{{__('admin') }}</span>
          <a role="button" class="nav-link active"
              onclick="document.getElementById('logout').submit();">{{__('logOutUser') }}</a>
          @csrf
        
      </form>
        
      </nav>
      

      <div class="g-0 m-5">
        @yield('content')
      </div>
    </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
</body>

</html>