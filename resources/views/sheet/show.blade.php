@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">表单详情
                    <a class="btn btn-link pull-right" href="{{ route('sheet.edit', $sheet->id) }}">
                        修改表单
                    </a>
                </div>
                <div class="card-body">
                    <div>名称：{{$sheet->name}}</div>
                    <div>简介：{{$sheet->brief}}</div>
                    <div>填写须知：{{$sheet->explanation}}</div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">全部列
                    <a class="btn btn-link" href="{{ route('sheet.column.create', ['sheet'=>$sheet->id]) }}">
                        新增列
                    </a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">名称</th>
                            <th scope="col">上级列</th>
                            <th scope="col">顺序</th>
                            <th scope="col">类型</th>
                            <th scope="col">填写须知</th>
                            <th scope="col"></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($sheet->columns->where('parent_column_id',0) as $column)
                            @include('sheet._column', ['column' => $column, 'parent_column' => ''])
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="card">
                <div class="card-header">内容列表
                    <a class="btn btn-link" href="{{ route('sheet.content.create', ['sheet'=>$sheet->id]) }}">
                        新增内容
                    </a>
                </div>
                <div class="card-body">
                    <table class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            @foreach($sheet->columns as $column)
                            @if($column->parent_column_id==0)
                            <th scope="col">{{$column->name}}</th>
                            @endif
                            @endforeach
                            <th></th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach($sheet->contents as $rowID => $content)
                            <tr>
                                <th scope="row">{{$rowID+1}}</th>
                                @foreach($sheet->columns as $column)
                                <td>{{array_key_exists($column->name, $content->data)? $content->data[$column->name]:''}}</td>
                                @endforeach
                                <td>
                                    <a class="btn btn-link" href="{{ route('sheet.content.edit', ['sheet'=>$sheet->id, 'content'=>$content->id]) }}">
                                        修改
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
