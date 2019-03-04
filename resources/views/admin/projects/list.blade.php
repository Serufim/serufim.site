@extends('admin.layout')

@section('content')
    <h2 class="title">Проекты</h2>
    <table class="table is-hoverable is-fullwidth is-striped">
        <thead>
            <tr>
                <th>Название</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Название</th>
                <th></th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($projects as $project)
                <tr>
                    <td>{{$project->name}}</td>
                    <td class="is-narrow">
                        <a href="{{route('projects.edit',['project'=>$project])}}">
                            <button class="button is-warning">Изменить</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection