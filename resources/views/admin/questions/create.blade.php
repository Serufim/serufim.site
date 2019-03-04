@extends('admin.layout')
@section('title', 'Создать Опрос')

@section('content')
    <h2 class="title">Новый Опрос</h2>
    @include('admin.questions.form')

@endsection