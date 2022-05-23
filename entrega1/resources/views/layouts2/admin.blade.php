<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
    crossorigin="anonymous" />
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
  <link href="{{ asset('/css/admin.css') }}" rel="stylesheet" />

</head>

<body>
  <div class="row g-0">
    <!-- sidebar -->
    <div class="p-3 col fixed text-white bg-dark">
      <a href="{{ route('home.index') }}" class="text-white text-decoration-none">
        <span class="fs-4">Admin Panel</span>
      </a>
      <hr />
      <img class="img-profile rounded-circle" height="30" width="30" src="{{ asset('/img/Messias.jpg') }}">
      <span class="profile-font"> Admin Messirve</span>
      <ul class="nav flex-column">
        <li><a href="{{ route('home.index') }}" class="nav-link text-white">- Admin - Home</a></li>
        <li><a href="{{ route('home.index') }}" class="nav-link text-white">- Admin - Products</a></li>
        <li>
          <a href="{{ route('home.index') }}" class="mt-2 btn bg-primary text-white">Go back to the home page</a>
        </li>
      </ul>
    </div>
    <div class="g-0 m-5">
        @yield('content')
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
  </script>
</body>

</html>