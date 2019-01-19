@extends('admin.layout')

@section('title', 'Изменение Типа купона')
@section('content')
    <h2 class="title">Изменить тип купона</h2>
    @include('admin.coupon_types.form',['type'=>$type])
@endsection