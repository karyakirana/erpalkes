@props([
    'label'=>null,
    'name'=>null
])
<div class="mb-10">
    <label x-bind:for="$id('input')">{{$label}}</label>
    {{$slot}}
    <x-input.error :messages="$errors->get($name)" />
</div>
