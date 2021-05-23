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
                <div class="card-header">创建列</div>

                <div class="card-body">
                    <div class="card-body">
                        <form method="POST" action="{{ route('sheet.column.store', ['sheet'=>$sheet->id]) }}">
                            @csrf

                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">列名称</label>
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="type" class="col-md-4 col-form-label text-md-right">列类型</label>
                                <div class="col-md-6">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="type-int" value="int">
                                        <label class="form-check-label" for="type-int">Integer</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="type-str" value="str">
                                        <label class="form-check-label" for="type-str">String</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="type-str" value="txt">
                                        <label class="form-check-label" for="type-str">Text</label>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="type" id="type-json" value="json">
                                        <label class="form-check-label" for="type-str">Json</label>
                                    </div>

                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="explanation" class="col-md-4 col-form-label text-md-right">本列填写须知（可不填）</label>
                                <div class="col-md-6">
                                    <textarea class="form-control" id="explanation" rows="4" name="explanation"></textarea>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">新建列</button>
                        </form>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
