@extends('main.layout')
@section('title', 'Секретные купоны')
@section('content')
    <section class="coupons-hero hero is-medium is-warning is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Секретные Купоны бургеркинг, кфс и не только
                </h1>
                <h2 class="subtitle">
                    Самый сок из секретных подвалов Кремля
                </h2>
            </div>
        </div>
    </section>
    <section id="table" class="table">
    </section>
    <section id="coupon_ref"></section>
    <div id="coupon_form">

    </div>
@endsection