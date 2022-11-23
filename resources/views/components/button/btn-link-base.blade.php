@props([
    'color'=>'primary'
])
<a {{$attributes->class('btn btn-'.$color)->merge()}}>{{$slot}}</a>
