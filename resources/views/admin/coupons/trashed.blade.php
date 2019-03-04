@extends('admin.layout')
@section('title', 'Список купонов')

@section('content')
    <h2 class="title">Удаленные Купоны</h2>
    <table class="table is-hoverable is-fullwidth is-striped">
        <thead>
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Название</th>
                <th>Описание</th>
                <th></th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($coupons as $coupon)
                <tr>
                    <td>{{$coupon->code}}</td>
                    <td>{{$coupon->description}}</td>
                    <td class="is-narrow">
                        <a href="{{route('coupons.restore',['coupon'=>$coupon])}}" class="button is-primary">
                            Востановить
                        </a>
                        <a href="{{route('coupons.force',['coupon'=>$coupon])}}" class="button is-danger">
                            Удалить
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $coupons->links() }}

@endsection