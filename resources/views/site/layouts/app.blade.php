<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link href="{{ url('style.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://unpkg.com/leaflet/dist/leaflet.css" />
    <style>
        #map {
            height: 500px !important;
            width: 50%;
            left: 11px;
            top: 11px;
        }
    </style>
</head>

<body>
    <header>

        <div class="site-header__middle container">
            <div class="site-header__logo"><a href="index.html">
                    <img src="{{ url('images/logo.png') }}" alt="">
                </a>
            </div>
            <div class="site-header__search">
                <div class="search">
                    <form class="search__form" action="#"><input class="search__input" name="search"
                            placeholder="Search over 10,000 products" aria-label="Site search" type="text"
                            autocomplete="off">
                        <button class="search__button" type="submit">
                            <img width="20px" height="20px" src="{{ url('images/icon/magnifier.png') }}"
                                alt="">
                        </button>
                        <div class="search__border"></div>
                    </form>
                </div>
            </div>
            <div class="site-header__cart">
                <div style="height: 35px;">
                    <h6 style="padding: 0;margin: 0;">My Account </h6>
                    <span style="font-size: 10px;">sign in</span>
                </div>
                <img width="30px" height="30px" src="{{ url('images/icon/user.png') }}">
            </div>
            <div class="site-header__cart">
                <div style="height: 35px;">
                    <h6 style="padding: 0;margin: 0;">My Cart </h6>
                    <span style="font-size: 10px;">0 EGP</span>
                </div>
                <img width="30px" height="30px" src="{{ url('images/icon/add-to-basket.png') }}">
            </div>

        </div>
        <!-- start navbar  -->
        <nav class="navbar navbar-expand-lg bg-body-tertiary ">
            <div class="container">
                {{-- <a class="navbar-brand" href="#">Navbar</a> --}}
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('products.index') }}">Shop</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Blog</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pickup.index') }}">Pick</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                Category
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- end navbar -->
    </header>
    @yield('content')
    <!-- js -->
    @yield('js')

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
        integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"
        integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous">
    </script>
</body>

</html>
