@extends('admin.layout')
@section('title', 'Создание типа купона')
@section('content')
    <h2 class="title">Новый тип купона</h2>
    @include('admin.coupon_types.form')
@endsection