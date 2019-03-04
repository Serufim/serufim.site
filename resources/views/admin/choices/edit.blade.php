@extends('admin.layout')
@section('title', 'Редактирование купона')

@section('content')
    <h2 class="title">Редактирование Опроса</h2>
    @include('admin.choices.form',['choice'=>$choice])
    @if(isset($choice))
        <form action="{{route('choice.destroy',['question_id'=>$question_id,'choice'=>$choice])}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="button is-danger">Удалить опрос</button>
        </form>
    @endif
@endsection