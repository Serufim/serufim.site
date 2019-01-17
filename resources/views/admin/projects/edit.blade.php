@extends('admin.layout')

@section('content')
    <h2 class="title">Редактирование проекта</h2>
    <form method="POST" action="{{route('projects.update',['project'=>$project])}}">
        @method("PUT")
        @csrf
        <div class="field">
            <label class="label">Название</label>
            <div class="control">
                <input class="input" type="text" name="name" placeholder="Название проекта" value="{{$project->name}}">
            </div>
        </div>
        <div class="field">
            <label class="label">Подзаголовок</label>
            <div class="control">
                <input class="input" type="text" name="subtitle" placeholder="Подзаголовок проекта" value="{{$project->subtitle}}">
            </div>
        </div>
        <div class="field">
            <label class="label">Описание</label>
            <div class="control">
                <textarea class="textarea" name="description" placeholder="Описание проекта (скро будет редактор)">{{$project->description}}</textarea>
            </div>
        </div>
        <div class="field">
            <label class="label">Демо-версия</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" type="url" name="demo" placeholder="Ссылка на демонстрационную версию" value="{{$project->demo}}">
                <span class="icon is-small is-left">
                    <i class="fas fa-play"></i>
                </span>
            </div>
        </div>
        <div class="columns">
            <div class="field column is-half">
                <label class="label">Дата начала работы</label>
                <div class="control">
                    <input type="date" name="created_time" class="input" value="{{$project->created_time}}">
                </div>
            </div>
            <div class="field column is-half">
                <label class="label">Последний релиз</label>
                <div class="control">
                    <input type="date" name="finished_time" class="input" value="{{$project->finished_time}}">
                </div>
            </div>
        </div>
        <div class="columns">
            <div class="field column is-half">
                <label class="label">Версия проекта</label>
                <div class="control">
                    <input type="text" name="current_version" class="input" placeholder="1.0.0" value="{{$project->current_version}}">
                </div>
            </div>
            <div class="field column is-half">
                <label class="label">Лицензия</label>
                <div class="control">
                    <input type="text" name="license" class="input" placeholder="GPL" value="{{$project->license}}">
                </div>
            </div>
        </div>
        <div class="buttons">
            <button type="submit" class="button is-success">Обновить информацию</button>
        </div>
    </form>
    <form action="{{route('projects.destroy',['project'=>$project])}}" method="POST">
        @method('DELETE')
        @csrf
        <button type="submit" class="button is-danger">Удалить информацию</button>
    </form>
@endsection