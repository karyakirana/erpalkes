@props([
    'label'=>null,
    'name'=>null
])
<div {{$attributes->class('mb-5')->merge() }}>
    <label x-bind:for="$id('input')" class="form-label">{{$label}}</label>
    {{$slot}}
    <x-input.error :messages="$errors->get($name)" />
</div>
