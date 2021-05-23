{{-- $i, $key, $value --}}
<div>
    <label for="link" class="col-form-label">{{$column->name}}{{$i}}</label>
    <div >
        <select class="custom-select" name="{{$column->name}}[{{$i}}][key]">
            <option  value="" selected>选择{{$column->name}}</option>

            @foreach($column->allowed_link_contents() as $link_content)
            <option value="{{$link_content->id}}" {{$key==$link_content->id?'selected':''}}>{{$link_content->id}}.{{$link_content->name}}</option>
            @endforeach

        </select>
    </div>
    <input type="text" class="form-control" name="{{$column->name}}[{{$i}}][value]" value="{{$value}}">
</div>
