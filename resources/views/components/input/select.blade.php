@aware(['error', 'name'])
@props(['error'=>null, 'name'=>null])
<select x-bind:id="$id('input')" name="{{$name}}" {{$attributes->class(['form-select', 'is-invalid'=>$errors->has($name)])->merge()}}>
    {{$slot}}
</select>
