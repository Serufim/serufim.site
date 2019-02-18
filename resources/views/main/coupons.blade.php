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
    <div class="container container--with-paddings">
        <div class="rsya rsya--left"><!-- Yandex.RTB R-A-348495-1 -->
            <div id="yandex_rtb_R-A-348495-1"></div>
        </div>
        <div class="rsya rsya--right"><!-- Yandex.RTB R-A-348495-1 -->
            <div id="yandex_rtb_R-A-348495-1"></div>
        </div>
        <section id="table" class="table">
        </section>
        <section id="coupon_ref"></section>
        <div id="coupon_form"></div>
    </div>
    <script type="text/javascript">
        (function(w, d, n, s, t) {
            w[n] = w[n] || [];
            w[n].push(function() {
                Ya.Context.AdvManager.render({
                    blockId: "R-A-348495-1",
                    renderTo: "yandex_rtb_R-A-348495-1",
                    async: true
                });
            });
            t = d.getElementsByTagName("script")[0];
            s = d.createElement("script");
            s.type = "text/javascript";
            s.src = "//an.yandex.ru/system/context.js";
            s.async = true;
            t.parentNode.insertBefore(s, t);
        })(this, this.document, "yandexContextAsyncCallbacks");
    </script>
@endsection