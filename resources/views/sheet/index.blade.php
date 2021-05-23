@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">全部数据</div>
                @if(@isset($sheets))
                @foreach($sheets as $sheet)
                <div class="card-body">
                    <div><a class="btn btn-link" href="{{ route('sheet.show', $sheet->id) }}">{{$sheet->name}}</a></div>
                    <div>{{$sheet->brief}}</div>
                    <div>{{$sheet->explanation}}</div>
                </div>
                @endforeach
                @endif
                <a class="btn btn-link" href="{{ route('sheet.create') }}">
                    创建表单
                </a>
            </div>
            <a class="btn btn-link" href="{{ route('sheet.download') }}">
                导出表单
            </a>
        </div>
    </div>
</div>
@endsection
