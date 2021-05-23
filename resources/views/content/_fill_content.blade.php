<div class="form-group row">
    <div class="col-md-10 offset-md-1">
        <div>
            <label for="{{$column->name}}" class="col-form-label">{{$column->name}}({{$column->type}})</label>
        </div>
        <div class="text-secondary">{{$column->explanation}}</div>
        @php
            $old_value = isset($is_edit) ? (array_key_exists($column->name, $content->data) ? $content->data[$column->name]:'') : old($column->name);
        @endphp

        @switch($column->type)
        @case('str')
        <div>
            <input type="text" class="form-control " name="{{$column->name}}" value="{{ $old_value }}">
        </div>
        @break

        @case('txt')
        <div >
            <textarea class="form-control" name="{{$column->name}}" rows="4">{{ $old_value }}</textarea>
        </div>
        @break

        @case('int')
        <div >
            <input type="number" class="form-control " name="{{$column->name}}" value="{{ $old_value }}">
        </div>
        @break

        @case('float')
        <div >
            <input type="number" step="0.01" class="form-control " name="{{$column->name}}" value="{{ $old_value }}">
        </div>
        @break

        @case('link')
        <div>
            <?php $i = 1 ?>
            @if(isset($is_edit))
            @foreach ($old_value as $key => $value)
            @include('content._fill_link',['i'=>$i,'key'=>$key, 'value'=>$value])
            <?php $i += 1 ?>
            @endforeach
            @endif
            @foreach(range($i,$i+1) as $i)
            @include('content._fill_link',['i'=>$i,'key'=>null, 'value'=>null])
            @endforeach
        </div>
        @break

        @default
        有待施工
        @endswitch
    </div>
</div>



