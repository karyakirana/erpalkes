@props([
    'header' => null,
    'title'=>null,
    'toolbar'=>null,
    'footer'=>null
])
<div class="card shadow-lg">
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
