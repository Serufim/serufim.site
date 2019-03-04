@extends('main.layout')

@section('content')
    <div class="container">
        <div class="main-page__title">
            <h2 class="title is-2">Проекты</h2>
            <span class="subtitle">Чем ты вообще занимаешься?</span>
        </div>
        <div class="columns">
            <div class="projects-filters column is-3">
                Фильтры проекты
            </div>
            <div class="projects-filters column is-multiline is-9 columns">
                @foreach ($projects as $project)
                    <article class="project-item column is-half-desktop is-half-tablet is-full-mobile">
                        <div class="project-background">
                            <div class="project-wrapper">
                                <a href="{{route('projects.view',['project'=>$project->id])}}">
                                    <div class="project-description">
                                        <h3 class="project-title title is-4">{{$project->name}}</h3>
                                        <p class="project-subtitle subtitle">{{$project->subtitle}}</p>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
        </div>
    </div>
@endsection