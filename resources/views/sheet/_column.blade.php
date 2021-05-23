<tr>
    <td>{{$column->name}}</td>
    <td>{{$column->order_by}}</td>
    <td>{{$column->type}}</td>
    <td>{{$column->explanation}}</td>
    <td>
        @if($column->rules)
        @foreach($column->rules as $key => $value)
        {{$key}}:{{$value}}<br>
        @endforeach
        @endif
    </td>
    <td>
        <a class="btn btn-link" href="{{ route('sheet.column.edit', ['sheet'=>$sheet->id, 'column'=>$column->id]) }}">
            修改
        </a>
    </td>
</tr>
