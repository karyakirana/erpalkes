@props([
    'label'=>null,
    'name'=>null
])
<div {{$attributes->class('mb-5 row')->merge() }} >
    <div class="col-4">
        <label class="col-form-label">{{$label}}</label>
    </div>
    <div class="col-8">
        {{$slot}}
    </div>
</div>
