@extends('admin.layout')

@section('content')
    <h2 class="title">Редактирование проекта</h2>
    @include('admin.projects.from',['project'=>$project])
    <form action="{{route('projects.destroy',['project'=>$project])}}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class="button is-danger">Удалить информацию</button>
    </form>
@endsection