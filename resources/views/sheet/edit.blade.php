@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">修改表单</div>

                <div class="card-body">
                    <div class="card-body">
                        <form method="POST" action="{{ route('sheet.update', $sheet->id) }}">
                            @csrf
                            @method('PATCH')

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">表单名称</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ $sheet->name }}" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="brief" class="col-md-4 col-form-label text-md-right">表单简介</label>
                                <div class="col-md-6">
                                    <input id="brief" type="text" class="form-control " name="brief" value="{{ $sheet->brief }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="explanation" class="col-md-4 col-form-label text-md-right">表单填写须知</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" id="explanation" rows="4" name="explanation">{{$sheet->explanation}}</textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">提交表单</button>
                        </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
