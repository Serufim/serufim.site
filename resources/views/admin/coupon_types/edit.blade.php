@extends('admin.layout')

@section('title', 'Изменение Типа купона')
@section('content')
    <h2 class="title">Изменить тип купона</h2>
    @include('admin.coupon_types.form',['type'=>$type])
    <form method="POST" class="column is-2" style="margin-bottom: 8px" action="{{route('coupon_types.destroy',['type'=>$type])}}">
        @method('DELETE')
        @csrf
        <button type="submit" class="button is-danger">Удалить</button>
    </form>
@endsection