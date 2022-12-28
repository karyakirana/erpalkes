@aware(['error', 'name'])
@props(['error'=>null, 'name'=>null])
<textarea name="{{$name}}" {{ $attributes->class(['form-control', 'is-invalid'=>$errors->has($name)])->merge() }} cols="30" rows="3"></textarea>
<x-input.error :messages="$errors->get($name)" />
