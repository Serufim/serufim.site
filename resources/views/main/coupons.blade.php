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
    <section class="container">
        <h3 class="coupons_title title is-3 is-size-4-mobile">Знаете купоны, которые не знаем мы???</h3>
        <p class="coupons_subtitle subtitle">Обязательно напишите нам об этом</p>
        <div class="columns">
            <form action="" class="coupons-form form column is-4">
                <div class="field">
                    <label class="label">Ваше сообщение</label>
                    <div class="control">
                        <textarea name="message" class="textarea"
                                  placeholder="Укажите максимально подробную информацию о известном вам купоне"></textarea>
                    </div>
                </div>
                <div class="buttons">
                    <button class="button is-primary">Отправить</button>
                </div>
            </form>
        </div>
    </section>
@endsection