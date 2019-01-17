@extends('admin.layout')

@section('content')
    <h2 class="title">Создание купона</h2>
    <form method="POST" action="{{route('coupons.store')}}">
        @csrf
        <div class="columns is-multiline">
            <div class="field column is-6">
                <label class="label">Код</label>
                <div class="control">
                    <input class="input {{ $errors->has('code') ? 'is-danger' : '' }}" name="code" type="text"
                           placeholder="Название проекта" value="{{ old('code') }}">
                </div>
                @if ($errors->has('code'))
                    <span class="invalid-feedback" role="alert">
                        <p class="help {{ $errors->has('code') ? 'is-danger' : '' }}">{{ $errors->first('code') }}</p>
                    </span>
                @endif
            </div>
            <div class="field column is-3">
                <label class="label">Цена</label>
                <div class="control">
                    <input class="input {{ $errors->has('price') ? 'is-danger' : '' }}" name="price" type="text" placeholder="Стоимость" value="{{ old('price') }}">
                </div>
                @if ($errors->has('price'))
                    <span class="invalid-feedback" role="alert">
                        <p class="help {{ $errors->has('price') ? 'is-danger' : '' }}">{{ $errors->first('price') }}</p>
                    </span>
                @endif
            </div>
            <div class="field column is-3">
                <label class="label">Цена без купона</label>
                <div class="control">
                    <input class="input {{ $errors->has('actual_price') ? 'is-danger' : '' }}" name="actual_price"
                           type="text" placeholder="Стоимость без купона" value="{{ old('actual_price') }}">
                </div>
                @if ($errors->has('actual_price'))
                    <span class="invalid-feedback" role="alert">
                        <p class="help {{ $errors->has('actual_price') ? 'is-danger' : '' }}">{{ $errors->first('actual_price') }}</p>
                    </span>
                @endif
            </div>
            <div class="field column is-8">
                <label class="label">Описание</label>
                <div class="control">
                    <input class="input {{ $errors->has('description') ? 'is-danger' : '' }}" name="description" type="text"
                           placeholder="Подзаголовок проекта" value="{{ old('description') }}">
                </div>
                @if ($errors->has('description'))
                    <span class="invalid-feedback" role="alert">
                        <p class="help {{ $errors->has('description') ? 'is-danger' : '' }}">{{ $errors->first('description') }}</p>
                    </span>
                @endif
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