@aware(['error', 'name'])
@props(['error'=>null, 'name'=>null, 'type' => 'text'])
<input type="{{$type}}" name="{{$name}}" {{ $attributes->class(['form-control', 'is-invalid'=>$errors->has($name)])->merge() }}>
<x-input.error :messages="$errors->get($name)" />
