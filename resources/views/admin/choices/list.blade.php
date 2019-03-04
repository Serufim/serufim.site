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
    @foreach ($choices as $choice)
        <tr>
            <td>{{$choice->title}}</td>
            <td class="is-narrow">
                <a href="{{route('choice.edit',['choice'=>$choice,'question_id'=>$question_id])}}">
                    <button class="button is-warning">Изменить</button>
                </a>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>