@extends('admin.layout')
@section('title', 'Редактирование купона')

@section('content')
    <h2 class="title">Редактирование Опроса</h2>
    @include('admin.questions.form',['question'=>$question])
    @if(isset($question))
        <form action="{{route('questions.destroy',['question'=>$question])}}" method="POST">
            @method('DELETE')
            @csrf
            <button type="submit" class="button is-danger">Удалить опрос</button>
        </form>
    @endif
    <h2 class="title">Варианты ответов</h2>
    @include('admin.choices.list',['choices'=>$question->choices,'question_id'=>$question->id])
    <a href="{{route('choice.create',['question_id'=>$question->id])}}" class="button is-success">Добавить новый</a>
@endsection