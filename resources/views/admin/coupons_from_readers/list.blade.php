@extends('admin.layout')
@section('title', 'Список купонов')

@section('content')
    <h2 class="title">Типы купонов</h2>
    <table class="table is-hoverable is-fullwidth is-striped">
        <thead>
            <tr>
                <th>Название</th>
                <th>Дата</th>
                <th></th>
            </tr>
        </thead>
        <tfoot>
            <tr>
                <th>Сообщение</th>
                <th>Дата</th>
                <th></th>
            </tr>
        </tfoot>
        <tbody>
            @foreach ($messages as $message)
                <tr>
                    <td class="is-narrow">{{$message->message}}</td>
                    <td class="is-narrow">{{$message->created_at}}</td>
                    <td class="is-narrow">
                        <form action="{{route('coupon_from_readers.destroy',['couponsFromReader'=>$message])}}" method="POST">
                            @method("DELETE")
                            @csrf
                            <button type="submit" class="button is-danger">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection