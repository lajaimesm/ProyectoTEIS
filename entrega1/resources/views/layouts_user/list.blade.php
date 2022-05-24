<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/fontawesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css" />
    <link href="{{ asset('/css/app2.css') }}" rel="stylesheet" />
    <title>@yield('title', 'Vasitos')</title>
</head>

<body>
    <!-- header -->
    <nav class="navbar navbar-expand-lg  py-4" id="navbar_header">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home.index') }}">Vasito</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav ms-auto">
                    <a class="nav-link active" id="a_home" href="{{ route('home.index') }}">{{__('Home') }}</a>
                    <div class="vr bg-white mx-2 d-none d-lg-block"></div>
                    <a class="nav-link active" id="a_login" href="{{ route('login') }}">{{__('loginUser') }}</a>
                    <a class="nav-link active" id="a_register" href="{{ route('register') }}">{{__('registerUser') }}</a>
                </div>
            </div>
        </div>
        </div>
    </nav>

    <!-- header -->

    <section class="content_section_1">
        <article color="#fffff" class="article_white">
            <header class="header_section_1">
                <div class="div_p_section_1">
                    <div class="container my-4">
                        @yield('content')
                    </div>
                </div>
            </header>
        </article>
    </section>

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
