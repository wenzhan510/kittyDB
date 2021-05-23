@if(array_key_exists($column->name, $content->data))
@switch($column->type)
@case('str')
@case('txt')
@case('int')
@case('float')
{{$content->data[$column->name]}}
@break

@case('link')
@foreach($content->data[$column->name] as $key=>$value)
@php
$content = $allContents->keyBy('id')->get($key);
@endphp
@if($content)
<a href="{{route('sheet.show', $content->sheet_id)}}#content.{{$content->id}}">{{$content->name}}:{{$value}}</a>
<br>
@endif
@endforeach
@break

@default
有待施工
@endswitch
@endif
