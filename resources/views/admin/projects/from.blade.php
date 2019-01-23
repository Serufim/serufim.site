<form method="POST" action="{{isset($project)?route('projects.update',['project'=>$project]):route('projects.store')}}">
    @if(isset($project))
        @method('PUT')
    @endif
    @csrf
    <div class="field">
        <label class="label">Название</label>
        <div class="control">
            <input class="input {{ $errors->has('name')     ? 'is-danger' : '' }}" name="name" type="text" placeholder="Название проекта"
                   value="{{ old('name',isset($project->name)?$project->name:null) }}">
        </div>
        @if ($errors->has('name'))
            <span class="invalid-feedback" role="alert">
                        <p class="help {{ $errors->has('name') ? 'is-danger' : '' }}">{{ $errors->first('name') }}</p>
                    </span>
        @endif
    </div>
    <div class="field">
        <label class="label">Подзаголовок</label>
        <div class="control">
            <input class="input {{ $errors->has('subtitle') ? 'is-danger' : '' }}" name="subtitle" type="text" placeholder="Подзаголовок проекта"
                   value="{{ old('subtitle',isset($project->name)?$project->name:null) }}">
        </div>
        @if ($errors->has('subtitle'))
            <span class="invalid-feedback" role="alert">
                <p class="help {{ $errors->has('subtitle') ? 'is-danger' : '' }}">{{ $errors->first('subtitle') }}</p>
            </span>
        @endif
    </div>
    <div class="field">
        <label class="label">Описание</label>
        <div class="control">
            <textarea class="textarea {{ $errors->has('description') ? 'is-danger' : '' }}" name="description" placeholder="Описание проекта (скро будет редактор)">{{ old('description',isset($project->description)?$project->description:null) }}</textarea>
        </div>
        @if ($errors->has('description'))
            <span class="invalid-feedback" role="alert">
                <p class="help {{ $errors->has('description') ? 'is-danger' : '' }}">{{ $errors->first('description') }}</p>
            </span>
        @endif
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
        <button type="submit" class="button is-success">{{isset($project)?"Обновить":"Добавить"}}</button>
    </div>
</form>