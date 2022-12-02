@props([
    'header' => null,
    'title'=>null,
    'toolbar'=>null,
    'footer'=>null
])
<div {{$attributes->class('card card shadow-lg mb-5')->merge() }}>
    @if($toolbar || $title)
        <div class="card-header">
            <div class="card-title">{{$title}}</div>
            <div class="card-toolbar">
                {{$toolbar}}
            </div>
        </div>
    @endif
    <div class="card-body">
        {{$slot}}
    </div>
        @if($footer)
            <div class="card-footer">
                {{$footer}}
            </div>
        @endif
</div>
