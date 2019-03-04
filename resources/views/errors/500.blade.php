@extends('layouts.auth')

@section('content')
    <section class="hero is-fullheight is-medium is-danger is-bold">
        <div class="hero-head">
        <nav class="navbar">
            <div class="container">
                <div class="navbar-brand">
                    <a class="navbar-item" href="{{route('main')}}">
                        @Serufim
                    </a>
                    <span class="navbar-burger burger" data-target="navbarMenuHeroA">
            <span></span>
            <span></span>
            <span></span>
          </span>
                </div>
                <div id="navbarMenuHeroA" class="navbar-menu">
                    <div class="navbar-start">
                        <a class="navbar-item has-text-grey-light">
                            Проекты
                        </a>
                        <a class="navbar-item has-text-grey-light">
                            dev-blog
                        </a>
                        <a class="navbar-item">
                            Секретные купоны
                        </a>
                    </div>
                </div>
            </div>
            </nav>
        </div>
        <div class="hero-body">
            <div class="container">
                <div class="columns is-centered">
                        <div class="card-content">
                            <h1 class="title is-1 has-text-centered">500</h1>
                            <p class="subtitle">На сервере что-то сломалось</p>
                            <div class="buttons is-centered">
                                <a href="{{route('main')}}" class="button is-outlined is-large is-dark">
                                    Вернуться
                                </a>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </section>

@endsection
