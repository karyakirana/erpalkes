@props(['type'=>'button', 'target'=>'', 'color'=>'primary'])
<button type="{{$type}}" {{$attributes->class(['btn btn-'.$color])}} data-bs-toggle="modal" data-bs-target="{{$target}}">{{$slot}}</button>
