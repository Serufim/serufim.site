<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>
<body>
    <nav class="admin-header navbar has-shadow is-spaced" role="navigation" aria-label="main navigation">
        <div class="container container--with-paddings">
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
                    <a class="navbar-item" href="{{route('main')}}">
                        Перейти на сайт
                    </a>
                </div>

                <div class="navbar-end">
                    <div class="navbar-item has-dropdown is-hoverable">
                        <a class="navbar-link">
                            {{Auth::user()->name}}
                        </a>
                        <div class="navbar-dropdown">
                            <!--<hr class="navbar-divider">-->
                            <a class="navbar-item" href="{{route('logout')}}">
                                Выход
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    <div class="container container--with-paddings">
        <div class="admin-page columns">
            <aside class="admin-menu column is-4 menu">
                <p class="menu-label">
                    Основные
                </p>
                <ul class="menu-list">
                    <li>
                        <a class="{{Route::currentRouteName()=='projects.index'?'is-active':null}}" href="{{route('projects.index')}}" style="">Проекты</a>
                        <ul>
                            <li><a class="{{Route::currentRouteName()=='projects.create'?'is-active':null}}" href="{{route('projects.create')}}">Добавить новый</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="{{Route::currentRouteName()=='coupons.index'?'is-active':null}}" href="{{route('coupons.index')}}" style="">Купоны</a>
                        <ul>
                            <li><a class="{{Route::currentRouteName()=='coupons.create'?'is-active':null}}" href="{{route('coupons.create')}}">Добавить новый</a></li>
                            <li><a class="{{Route::currentRouteName()=='coupons.trashed'?'is-active':null}}" href="{{route('coupons.trashed')}}">Удаленые купоны</a></li>
                            <li><a class="{{Route::currentRouteName()=='coupon_types.index'?'is-active':null}}" href="{{route('coupon_types.index')}}">Типы купонов</a>
                                <ul>
                                    <li><a class="{{Route::currentRouteName()=='coupon_types.create'?'is-active':null}}" href="{{route('coupon_types.create')}}">Добавить</a></li>
                                </ul>
                            </li>
                            <li><a class="{{Route::currentRouteName()=='coupon_from_readers.index'?'is-active':null}}" href="{{route('coupon_from_readers.index')}}">Купоны пользователей</a></li>
                            <li><a class="{{Route::currentRouteName()=='coupon_analitics.index'?'is-active':null}}" href="{{route('coupon_analitics.index')}}">Аналитика</a></li>
                        </ul>
                    </li>
                    <li>
                        <a class="{{Route::currentRouteName()=='questions.index'?'is-active':null}}" href="{{route('questions.index')}}" style="">Опросы</a>
                        <ul>
                            <li><a class="{{Route::currentRouteName()=='questions.create'?'is-active':null}}" href="{{route('questions.create')}}">Добавить новый</a></li>
                        </ul>
                    </li>
                </ul>
            </aside>
            <section class="admin-content column is-8">
                @yield('content')
            </section>
        </div>
    </div>
    <script src="{{asset('js/app.js')}}"></script>
</div>
</body>
</html>