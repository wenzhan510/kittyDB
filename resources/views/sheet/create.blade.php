@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">创建表单</div>

                <div class="card-body">
                    <div class="card-body">
                        <form method="POST" action="{{ route('sheet.store') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">表单名称</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="brief" class="col-md-4 col-form-label text-md-right">表单简介</label>
                                <div class="col-md-6">
                                    <input id="brief" type="text" class="form-control " name="brief" value="{{ old('brief') }}" required>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="explanation" class="col-md-4 col-form-label text-md-right">表单填写须知</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" id="explanation" rows="4" name="explanation">{{ old('explanation') }}</textarea>
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
