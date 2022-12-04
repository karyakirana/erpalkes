@props([
    'label'=>null,
    'name'=>null
])
<div {{$attributes->class('mb-5')->merge() }}>
    <label class="form-label">{{$label}}</label>
    {{$slot}}
</div>
