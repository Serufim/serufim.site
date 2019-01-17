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
    <section class="table">
        <div class="container">
            <h2 class="title">Купоны</h2>
            <table class="table is-hoverable is-fullwidth is-striped">
                <thead>
                <tr>
                    <th>Куда</th>
                    <th>Купон</th>
                    <th>Стоимость</th>
                    <th>Без купона</th>
                    <th>Выгода</th>
                    <th>Описание</th>
                </tr>
                </thead>
                <tfoot>
                <tr>
                    <th>Куда</th>
                    <th>Купон</th>
                    <th>Стоимость</th>
                    <th>Без купона</th>
                    <th>Выгода</th>
                    <th>Описание</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach ($coupons as $coupon)
                    <tr>
                        <td>Бургеркинг</td>
                        <td class="is-narrow has-text-info">{{$coupon->code}}</td>
                        <td class="is-narrow">{{$coupon->price}}</td>
                        <td class="has-text-danger">{{$coupon->actual_price}}</td>
                        <td class="has-text-success">{{$coupon->actual_price - $coupon->price}} ({{ number_format($coupon->price / $coupon->actual_price * 100, 1)}}%)</td>
                        <td>{{$coupon->description}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </section>
    <section class="coupon-form">
        <div class="container">
            <h3 class="title is-3">Знаете купоны, которые не знаем мы???</h3>
            <p class="subtitle">Обязательно напишите нам об этом</p>
            <form action="" class="form">
                <div class="field">
                    <label class="label">Код</label>
                    <div class="control">
                        <input class="input" name="extra" type="text" placeholder="ваш купон">
                    </div>
                </div>
                <div class="field">
                    <label class="label">Описание</label>
                    <div class="control">
                        <input class="input" name="extra" type="text" placeholder="ваш купон">
                    </div>
                </div>
                <div class="buttons">
                    <button class="button is-primary">Отправить</button>
                </div>
            </form>
        </div>
    </section>
@endsection