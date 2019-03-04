@extends('admin.layout')
@section('title', 'Редактирование купона')

@section('content')
    <h2 class="title">Редактирование Купона</h2>
    @include('admin.coupons.form',['coupon'=>$coupon])
    @if(isset($coupon))
        <form action="{{route('coupons.destroy',['coupon'=>$coupon])}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="button is-danger">Удалить информацию</button>
        </form>
    @endif
@endsection