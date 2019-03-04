
<form method="POST" action="{{isset($question)?route('questions.update',['question'=>$question]):route('questions.store')}}">
    @if(isset($question))
        @method('PUT')
    @endif
    @csrf
    <div class="columns is-multiline">
        <div class="field column is-12">
            <label class="label">Заголовок</label>
            <div class="control">
                <input class="input {{ $errors->has('code') ? 'is-danger' : '' }}" name="title" type="text"
                       placeholder="Заголовок" value="{{ old('title',isset($question->title)?$question->title:null) }}">
            </div>
            @if ($errors->has('title'))
                <span class="invalid-feedback" role="alert">
                        <p class="help {{ $errors->has('title') ? 'is-danger' : '' }}">{{ $errors->first('title') }}</p>
                    </span>
            @endif
        </div>
        <div class="field column is-12">
            <label class="label">Подзаголовок</label>
            <div class="control">
                <input class="input {{ $errors->has('subtitle') ? 'is-danger' : '' }}" name="subtitle" type="text"
                       placeholder="Заголовок" value="{{ old('subtitle',isset($question->subtitle)?$question->subtitle:null) }}">
            </div>
            @if ($errors->has('subtitle'))
                <span class="invalid-feedback" role="alert">
                        <p class="help {{ $errors->has('subtitle') ? 'is-danger' : '' }}">{{ $errors->first('subtitle') }}</p>
                    </span>
            @endif
        </div>
    </div>
    <div class="buttons">
        <button class="button is-success">
            @if(!isset($question))
                Добавить Купон
            @else
                Обновить информацию
            @endif
        </button>
    </div>
</form>