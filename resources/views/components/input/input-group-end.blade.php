@aware(['error', 'name'])
@props(['error'=>null, 'name'=>null, 'addOn' => ''])
<div class="input-group">
    <input type="text" name="{{$name}}" {{ $attributes->class(['form-control', 'is-invalid'=>$errors->has($name)])->merge() }}>
    <span class="input-group-text">{{$addOn}}</span>
    <x-input.error :messages="$errors->get($name)" />
</div>
