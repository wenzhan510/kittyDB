<tr>
    <td>{{$column->name}}</td>
    <td>{{$parent_column?$parent_column->name:''}}</td>
    <td>{{$column->order_by}}</td>
    <td>{{$column->type}}</td>
    <td>{{$column->explanation}}</td>
    <td>
        <a class="btn btn-link" href="{{ route('sheet.column.edit', ['sheet'=>$sheet->id, 'column'=>$column->id]) }}">
            修改
        </a>
    </td>
</tr>
@foreach($sheet->columns->where('parent_column_id',$column->id) as $sub_column)
@include('sheet._column', ['column' => $sub_column, 'parent_column' => $column])
@endforeach
