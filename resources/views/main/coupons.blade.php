@extends('main.layout')

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
    <section class="table">
        <div class="container">
            <h2 class="coupons_title title is-2 is-size-3-mobile">Подробная таблица</h2>
            <p class="coupons_subtitle subtitle">Мы постоянно обновляем все данные</p>
            <table class="coupon-table table is-hoverable is-narrow">
                <thead class="is-hidden-mobile">
                <tr>
                    <th>Куда</th>
                    <th>Купон</th>
                    <th>Стоимость</th>
                    <th>Без купона</th>
                    <th>Выгода</th>
                    <th>Описание</th>
                </tr>
                </thead>
                <tfoot class="is-hidden-mobile">
                <tr>
                    <th>Куда</th>
                    <th>Купон</th>
                    <th>Стоимость</th>
                    <th class="is-narrow">Без купона</th>
                    <th>Выгода</th>
                    <th>Описание</th>
                </tr>
                </tfoot>
                <tbody>
                @foreach ($coupons as $coupon)
                    <tr class="coupon-table-row">
                        <td class="coupon-table-row__type is-narrow">
                            {{$coupon->type['name']}}</td>
                        <td class="coupon-table-row__code is-narrow has-text-info">
                            {{$coupon->code}}
                        </td>
                        <td class="coupon-table-row__price is-narrow has-text-centered-mobile" >
                            <p class="label is-hidden-tablet">Цена</p>
                            {{$coupon->price}}
                        </td>
                        <td class="coupon-table-row__actual-price has-text-danger has-text-centered-mobile">
                            <p class="label is-hidden-tablet">Без купона</p>
                            {{$coupon->actual_price}}
                        </td>
                        <td class="coupon-table-row__value has-text-success is-narrow has-text-centered-mobile">
                            <p class="label is-hidden-tablet">Выгода</p>
                            {{$coupon->actual_price - $coupon->price}} (%)</td>
                        <td class="coupon-table-row__description is-narrow">
                            <p class="label is-hidden-tablet">Описание</p>
                            {{$coupon->description}}
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
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