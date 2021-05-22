@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">当前表单</div>
                @if(@isset($sheets))
                @foreach($sheets as $sheet)
                <div class="card-body">
                    <div>{{$sheet->name}}</div>
                    <div>{{$sheet->brief}}</div>
                    <div>{{$sheet->explanation}}</div>
                </div>
                @endforeach
                @endif
                <a class="btn btn-link" href="{{ route('sheet.create') }}">
                    创建表单
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
