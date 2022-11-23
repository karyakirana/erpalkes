@props([
    'color'=>'primary'
])
<button {{$attributes->class('btn btn-'.$color)->merge()}}>{{$slot}}</button>
