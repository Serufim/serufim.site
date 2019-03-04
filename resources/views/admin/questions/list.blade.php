@extends('admin.layout')
@section('title', 'Список Опросов')

@section('content')
    <h2 class="title">Опросы</h2>
    <table class="table is-hoverable is-fullwidth is-striped">
        <thead>
        <tr>
            <th>Заголовок</th>
            <th></th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th>Заголовок</th>
            <th></th>
        </tr>
        </tfoot>
        <tbody>
        @foreach ($questions as $question)
            <tr>
                <td>{{$question->title}}</td>
                <td class="is-narrow">
                    <a href="{{route('questions.edit',['$question'=>$question])}}">
                        <button class="button is-warning">Изменить</button>
                    </a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection