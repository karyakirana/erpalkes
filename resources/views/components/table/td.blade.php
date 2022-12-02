@props(['align'=>null, 'width'=>'auto'])
<td {{$attributes->class('text-'.$align)->merge(['style'=>'width:'.$width]) }}>{{$slot}}</td>
