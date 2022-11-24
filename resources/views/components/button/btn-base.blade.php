@props([
    'color'=>'primary',
    'type'=>'button'
])
<button type="{{$type}}" {{$attributes->class('btn btn-'.$color)->merge()}}>{{$slot}}</button>
