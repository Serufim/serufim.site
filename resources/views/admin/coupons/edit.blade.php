@extends('admin.layout')
@section('title', 'Редактирование купона')

@section('content')
    <h2 class="title">Редактирование Купона</h2>
    <form method="POST" action="{{route('coupons.update',['coupon'=>$coupon])}}">
        @method("PUT")
        @csrf
        {{$coupon->type_id}}
        <div class="columns is-multiline">
            <div class="field column is-6">
                <label class="label">Код</label>
                <div class="control">
                    <input class="input" type="text" name="code" placeholder="Название проекта" value="{{$coupon->code}}">
                </div>
            </div>
            <div class="field column is-3">
                <label class="label">Цена</label>
                <div class="control">
                    <input class="input" name="price" type="text" placeholder="Стоимость"  value="{{$coupon->price}}">
                </div>
            </div>
            <div class="field column is-3">
                <label class="label">Цена без купона</label>
                <div class="control">
                    <input class="input" name="actual_price" type="text" placeholder="Стоимость без купона" value="{{$coupon->actual_price}}">
                </div>
            </div>
            <div class="field column is-8">
                <label class="label">Описание</label>
                <div class="control">
                    <input class="input" type="text" name="description" placeholder="Подзаголовок проекта" value="{{$coupon->description}}">
                </div>
            </div>
            <div class="field column is-4">
                <label class="label">Дополнительно</label>
                <div class="control">
                    <input class="input" name="extra" type="text" placeholder="Дополнительная информация"  value="{{$coupon->code}}">
                </div>
            </div>
        </div>
        <div class="buttons">
            <button type="submit" class="button is-success">Обновить информацию</button>
        </div>
    </form>

@endsection