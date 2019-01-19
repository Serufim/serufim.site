@extends('admin.layout')

@section('content')
    <h2 class="title">Купоны</h2>
    <table class="table is-hoverable is-fullwidth is-striped">
        <thead>
            <tr>
                <th>Название</th>
                <th>ХЗ</th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Название</th>
                <th>ХЗ</th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($types as $type)
                <tr>
                    <td class="is-narrow">{{$type->name}}</td>
                    <td class="is-narrow">
                        <a href="{{route('coupon_types.edit',['type'=>$type])}}">
                            <button class="button is-warning">Изменить</button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection