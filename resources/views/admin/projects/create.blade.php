@extends('admin.layout')

@section('content')
    <h2 class="title">Создание нового проекта</h2>
    <form method="POST" action="{{route('projects.store')}}">
        @csrf
        <div class="field">
            <label class="label">Название</label>
            <div class="control">
                <input class="input" name="name" type="text" placeholder="Название проекта">
            </div>
        </div>
        <div class="field">
            <label class="label">Подзаголовок</label>
            <div class="control">
                <input class="input" name="subtitle" type="text" placeholder="Подзаголовок проекта">
            </div>
        </div>
        <div class="field">
            <label class="label">Описание</label>
            <div class="control">
                <textarea class="textarea" name="description" placeholder="Описание проекта (скро будет редактор)"></textarea>
            </div>
        </div>
        <div class="field">
            <label class="label">Демо-версия</label>
            <div class="control has-icons-left has-icons-right">
                <input class="input" type="url" placeholder="Ссылка на демонстрационную версию">
                <span class="icon is-small is-left">
                    <i class="fas fa-play"></i>
                </span>
            </div>
        </div>
        <div class="field">
            <label class="label">Дата начала работы</label>
            <div class="control">
                <input type="date" class="input">
            </div>
        </div>
        <div class="field">
            <label class="label">Последний релиз</label>
            <div class="control">
                <input type="date" class="input">
            </div>
        </div>
        <div class="field">
            <label class="label">Версия проекта</label>
            <div class="control">
                <input type="text" class="input" placeholder="1.0.0">
            </div>
        </div>
        <div class="field">
            <label class="label">Лицензия</label>
            <div class="control">
                <input type="text" class="input" placeholder="GPL">
            </div>
        </div>
        <div class="buttons">
            <button class="button is-success">Добавить проект</button>
        </div>
    </form>
@endsection