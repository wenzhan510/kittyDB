@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">表单详情</div>
                <div class="card-body">
                    <div>名称：{{$sheet->name}}</div>
                    <div>简介：{{$sheet->brief}}</div>
                    <div>填写须知：{{$sheet->explanation}}</div>
                </div>
            </div>

            <form method="POST" action="{{ route('sheet.content.store', $sheet->id) }}">
                @csrf
                <div class="card">
                    <div class="card-header">新增内容
                    </div>
                    <div class="card-body">
                        <div class="form-group row">
                            <div class="col-md-10 offset-md-1">
                                <div>
                                    <label for="name" class="col-form-label">Name(必填,str)</label>
                                </div>
                                <div>
                                    <input type="text" class="form-control " name="name" value="{{ old('name') }}">
                                </div>
                            </div>
                        </div>
                        @foreach($sheet->columns->where('parent_column_id',0) as $column)
                        @include('content._fill_content', ['column' => $column, 'array_id' => -1])
                        @endforeach
                        <button type="submit" class="btn btn-primary">提交</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
