<div class="columns" style="align-items: flex-end">
    <form method="POST" class="column is-8"
          action="{{isset($type)?route('coupon_types.update',['couponType'=>$type]):route('coupon_types.store')}}">
        @if(isset($type))
            @method('PUT')
        @endif
        @csrf
        <div class="columns is-multiline" style="align-items: flex-end">
            <div class="field column is-7">
                <label class="label">Название</label>
                <div class="control">
                    <input class="input {{ $errors->has('name') ? 'is-danger' : '' }}" name="name" type="text"
                           placeholder="Название проекта" value="{{ old('name',isset($type->name)?$type->name:null) }}">
                </div>
                @if ($errors->has('name'))
                    <span class="invalid-feedback" role="alert">
                        <p class="help {{ $errors->has('name') ? 'is-danger' : '' }}">{{ $errors->first('name') }}</p>
                    </span>
                @endif
            </div>
            <div class="buttons column is-5" style="margin-bottom: 6px">
                <button type="submit" class="button is-success">
                    @if(!isset($type))
                        Добавить Тип купона
                    @else
                        Обновить информацию
                    @endif
                </button>
            </div>
        </div>
    </form>
</div>
