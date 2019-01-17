<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
</head>
<body>
<nav class="navbar has-shadow is-spaced" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{route('home')}}">
            <b>@Serufim</b>
        </a>

        <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navbarBasicExample">
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
            <span aria-hidden="true"></span>
        </a>
    </div>

    <div id="navbarBasicExample" class="navbar-menu">
        <div class="navbar-start">
            <a class="navbar-item">

            </a>
            <a class="navbar-item has-text-grey-light">
                Проекты
            </a>
            <a class="navbar-item has-text-grey-light">
                Dev-blog
            </a>
            <a class="navbar-item" href="{{route('coupons')}}">
                Секретные купоны
            </a>
        </div>

        <div class="navbar-end">
            <a class="navbar-item has-text-grey-light">
                Об авторе
            </a>
        </div>
    </div>
</nav>
<section class="main-page">
    @yield('content')
</section>
</body>
</html>