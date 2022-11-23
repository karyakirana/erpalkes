@aware(['error', 'name'])
@props(['error'=>null, 'name'=>null])
<input x-bind:id="$id('input')" type="text" name="{{$name}}" {{ $attributes->class(['form-control', 'is-invalid'=>$errors->has($name)])->merge() }}>
