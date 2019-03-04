<form method="POST" action="{{isset($choice)?route('choice.update',['choice'=>$choice,'question_id'=>$question_id]):route('choice.store',['question_id'=>$question_id])}}">
    @if(isset($choice))
        @method('PUT')
    @endif
    @csrf
    <div class="columns is-multiline">
        <div class="field column is-12">
            <label class="label">Вариант ответа</label>
            <div class="control">
                <input class="input {{ $errors->has('title') ? 'is-danger' : '' }}" name="title" type="text"
                       placeholder="Заголовок" value="{{ old('title',isset($choice->title)?$choice->title:null) }}">
            </div>
            @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                        <p class="help {{ $errors->has('title') ? 'is-danger' : '' }}">{{ $errors->first('title') }}</p>
                    </span>
            @endif
        </div>
    </div>
    <div class="buttons">
        <button class="button is-success">
            @if(!isset($choice))
                Добавить Вариант ответа
            @else
                Обновить
            @endif
        </button>
    </div>
</form>