@props([
    'label'=>null,
    'name'=>null
])
<div class="mb-10">
    <label x-bind:for="$id('input')" class="form-label">{{$label}}</label>
    {{$slot}}
    <x-input.error :messages="$errors->get($name)" />
</div>
