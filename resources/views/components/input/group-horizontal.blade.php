@props([
    'label'=>null,
    'name'=>null
])
<div class="mb-10 row" x-data x-id="['input']">
    <div class="col-4">
        <label x-bind:for="$id('input')" class="col-form-label">{{$label}}</label>
    </div>
    <div class="col-8">
        {{$slot}}
        <x-input.error :messages="$errors->get($name)" />
    </div>
</div>
