@extends('admin.layout')

@section('content')
    <h2 class="title">Создание купона</h2>
    <form method="POST" action="{{route('coupons.store')}}">
        @csrf
        <div class="columns is-multiline">
            <div class="field column is-6">
                <label class="label">Код</label>
                <div class="control">
                    <input class="input" name="code" type="text" placeholder="Название проекта">
                </div>
            </div>
            <div class="field column is-3">
                <label class="label">Цена</label>
                <div class="control">
                    <input class="input" name="price" type="text" placeholder="Стоимость">
                </div>
            </div>
            <div class="field column is-3">
                <label class="label">Цена без купона</label>
                <div class="control">
                    <input class="input" name="actual_price" type="text" placeholder="Стоимость без купона">
                </div>
            </div>
            <div class="field column is-8">
                <label class="label">Описание</label>
                <div class="control">
                    <input class="input" name="description" type="text" placeholder="Подзаголовок проекта">
                </div>
            </div>
            <div class="field column is-4">
                <label class="label">Дополнительно</label>
                <div class="control">
                    <input class="input" name="extra" type="text" placeholder="Дополнительная информация">
                </div>
            </div>
        </div>

        <div class="buttons">
            <button class="button is-success">Добавить Купон</button>
        </div>
    </form>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
@endsection