@extends('admin.layout')
@section('title', 'Создать купон')

@section('content')
    @if(!isset($coupon))
        <h2 class="title">Создание купона</h2>
    @else
        <h2 class="title">Редактирование Купона</h2>
    @endif

    <form method="POST" action="{{isset($coupon)?route('coupons.update',['coupon'=>$coupon]):route('coupons.store')}}">
        @if(isset($coupon))
            @method('PUT')
        @endif
        @csrf
        <div class="columns is-multiline">
            <div class="field column is-3">
                <label class="label">Код</label>
                <div class="control">
                    <input class="input {{ $errors->has('code') ? 'is-danger' : '' }}" name="code" type="text"
                           placeholder="Название проекта" value="{{ old('code',isset($coupon->code)?$coupon->code:null) }}">
                </div>
                @if ($errors->has('code'))
                    <span class="invalid-feedback" role="alert">
                        <p class="help {{ $errors->has('code') ? 'is-danger' : '' }}">{{ $errors->first('code') }}</p>
                    </span>
                @endif
            </div>
            <div class="field column is-3">
                <label class="label">Тип</label>
                <div class="control">
                    <div class="select {{ $errors->has('code') ? 'is-danger' : '' }}">
                        <select name="type_id">
                            @foreach($types as $type)
                                <option value="{{$type->id}}" {{isset($coupon->type_id)&&$coupon->type_id==$type->id?'selected':null}}>{{$type->name }}</option>
                            @endforeach
                        </select>
                    </div>

                </div>
                @if ($errors->has('code'))
                    <span class="invalid-feedback" role="alert">
                        <p class="help {{ $errors->has('type_id') ? 'is-danger' : '' }}">{{ $errors->first('type_id') }}</p>
                    </span>
                @endif
            </div>
            <div class="field column is-3">
                <label class="label">Цена</label>
                <div class="control">
                    <input class="input {{ $errors->has('price') ? 'is-danger' : '' }}" name="price" type="text"
                           placeholder="Стоимость" value="{{ old('price', isset($coupon->price) ? $coupon->price : null)}}">
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
                           type="text" placeholder="Стоимость без купона" value="{{ old('actual_price', isset($coupon->actual_price) ? $coupon->actual_price : null)}}">
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
                           placeholder="Подзаголовок проекта" value="{{ old('description', isset($coupon->description) ? $coupon->description : null)}}">
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
                    <input class="input" name="extra" type="text"
                           placeholder="Дополнительная информация" value="{{ old('extra', isset($coupon->extra) ? $coupon->extra : null) }}">
                </div>
            </div>
        </div>

        <div class="buttons">
            <button class="button is-success">
                @if(!isset($coupon))
                    Добавить Купон
                @else
                    Обновить информацию
                @endif
            </button>
        </div>
    </form>
    @if(isset($coupon))
        <form action="{{route('coupons.destroy',['coupon'=>$coupon])}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="button is-danger">Удалить информацию</button>
        </form>
    @endif
@endsection