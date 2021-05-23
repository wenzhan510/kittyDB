@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">表单详情</div>
                <div class="card-body">
                    <div>名称：{{$sheet->name}}</div>
                    <div>简介：{{$sheet->brief}}</div>
                    <div>填写须知：{{$sheet->explanation}}</div>
                </div>
            </div>


            <div class="card">
                <div class="card-header">新增内容
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('sheet.content.store', $sheet->id) }}">
                        @csrf

                        @foreach($sheet->columns as $column)

                        @switch($column->type)
                        @case('str')
                        <div class="form-group row">
                            <label for="{{$column->name}}" class="col-md-4 col-form-label text-md-right">{{$column->name}}({{$column->type}})</label>
                            <div>{{$column->explanation}}</div>

                            <div class="col-md-6">
                                <input id="{{$column->name}}" type="text" class="form-control " name="{{$column->name}}" value="{{ old($column->name) }}">
                            </div>
                        </div>
                        @break

                        @case('txt')
                        <div class="form-group row">
                            <label for="{{$column->name}}" class="col-md-4 col-form-label text-md-right">{{$column->name}}({{$column->type}})</label>
                            <div>{{$column->explanation}}</div>

                            <div class="col-md-6">
                                <textarea id="{{$column->name}}" class="form-control" name="{{$column->name}}" rows="4"></textarea>
                            </div>
                        </div>
                        @break

                        @case('int')
                        <div class="form-group row">
                            <label for="{{$column->name}}" class="col-md-4 col-form-label text-md-right">{{$column->name}}({{$column->type}})</label>
                            <div>{{$column->explanation}}</div>

                            <div class="col-md-6">
                                <input id="{{$column->name}}" type="number" class="form-control " name="{{$column->name}}" value="{{ old($column->name) }}">
                            </div>
                        </div>
                        @break

                        @default
                        有待施工
                        @endswitch
                        @endforeach
                        <button type="submit" class="btn btn-primary">提交</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
