<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @auth
        <meta name="admin-token" content="secret">
    @endauth
    <title>@yield('title')</title>
    <script defer src="https://use.fontawesome.com/releases/v5.3.1/js/all.js"></script>
    {{--<script src="https://authedmine.com/lib/captcha.min.js" async></script>--}}
    <link rel="stylesheet" href="{{asset('css/main.css')}}">
    <!-- Yandex.Metrika counter -->
    <script type="text/javascript" >
        (function(m,e,t,r,i,k,a){m[i]=m[i]||function(){(m[i].a=m[i].a||[]).push(arguments)};
            m[i].l=1*new Date();k=e.createElement(t),a=e.getElementsByTagName(t)[0],k.async=1,k.src=r,a.parentNode.insertBefore(k,a)})
        (window, document, "script", "https://mc.yandex.ru/metrika/tag.js", "ym");

        ym(52283506, "init", {
            id:52283506,
            clickmap:true,
            trackLinks:true,
            accurateTrackBounce:true,
            webvisor:true
        });
    </script>
    <noscript><div><img src="https://mc.yandex.ru/watch/52283506" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <!-- /Yandex.Metrika counter -->
</head>
<body>
<nav class="navbar has-shadow is-spaced" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
        <a class="navbar-item" href="{{route('main')}}">
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
            <a class="navbar-item" href="{{route('chat')}}">
                Seruchat
            </a>
            @auth
                <a class="navbar-item" href="{{route('admin')}}">
                    Админка
                </a>
            @endauth
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
<script src="{{asset('js/app.js')}}"></script>
{{--<script src="https://www.google.com/recaptcha/api.js" async defer></script>--}}

</body>
</html>