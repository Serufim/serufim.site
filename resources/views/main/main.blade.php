@extends('main.layout')
@section('title', '@Serufim - Блог и Мастерская Сергея Уфимцева')

@section('content')
    <section class="hero is-medium is-primary is-bold">
        <div class="hero-body">
            <div class="container">
                <h1 class="title">
                    Блог и мастерская Сережи Уфимцева
                </h1>
                <h2 class="subtitle">
                    Самая актуальная информация о всех моих делах
                </h2>
            </div>
        </div>
    </section>
    <section class="release-calendar">
        <div class="container">
            <h2 class="title">Календарь релизов</h2>
            <div class="release-note">
                <div class="date box is-rounded">20<br>Фев</div>
                <div class="description box">Софт делиты в базе, пагинация. И самое главное голосовалки теперь доступны</div>
            </div>
            <div class="release-note">
                <div class="date box is-rounded">20<br>Фев</div>
                <div class="description box">Софт делиты в базе, пагинация. И самое главное голосовалки теперь доступны</div>
            </div>
        </div>
    </section>
@endsection