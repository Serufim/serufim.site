@extends('main.layout')

@section('content')
    <section class="hero is-medium is-warning is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Секретные Купоны бургеркинг и кфс
                </h1>
                <h2 class="subtitle">
                    Смотри не обляпайся
                </h2>
            </div>
        </div>
    </section>
    @foreach ($coupons as $coupon)
        <div class="container">
            <h2 class="title">Купоны</h2>
            <table class="table is-hoverable is-fullwidth is-striped">
                <thead>
                <tr>
                    <th>Название</th>
                    <th>Описание</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Название</th>
                    <th>Описание</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach ($coupons as $coupon)
                    <tr>
                        <td class="is-narrow">{{$coupon->code}}</td>
                        <td>{{$coupon->description}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    @endforeach
@endsection