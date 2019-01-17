<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>
<body>
<div class="admin-layout">

    <nav class="admin-header navbar has-shadow is-spaced" role="navigation" aria-label="main navigation">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{route('admin')}}">
                <b>@Serufim</b>
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false"
               data-target="navbarBasicExample">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="navbarBasicExample" class="navbar-menu">
            <div class="navbar-start">
                <a class="navbar-item" href="{{route('home')}}">
                    Перейти на сайт
                </a>
            </div>

            <div class="navbar-end">
                <div class="navbar-item has-dropdown is-hoverable">
                    <a class="navbar-link">
                        Admin
                    </a>
                    <div class="navbar-dropdown">
                        <!--<hr class="navbar-divider">-->
                        <a class="navbar-item">
                            Выход
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <aside class="admin-panel menu">
        <p class="menu-label">
            Основные
        </p>
        <ul class="menu-list">
            <li>
                <a class="is-active" href="{{route('projects.index')}}" style="">Проекты</a>
                <ul>
                    <li><a href="{{route('projects.create')}}">Добавить новый</a></li>
                </ul>
            </li>
            <li>
                <a class="" href="{{route('coupons.index')}}" style="">Купоны БК</a>
                <ul>
                    <li><a href="{{route('coupons.create')}}">Добавить новый</a></li>
                </ul>
            </li>
        </ul>
    </aside>
    <section class="admin-page">
        @yield('content')
    </section>
</div>
</body>
</html>