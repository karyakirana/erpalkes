@props(['head'=>null, 'footer'=>null])
<table {{$attributes->class('table align-middle table-striped table-row-bordered fs-6 gy-5 gs-7')}}>
    <thead class="text-center fw-bold ">
        {{$head}}
    </thead>
    <tbody  class="text-center">
        {{$slot}}
    </tbody >
    @if($footer)
        <tfooter >
        {{$footer}}
        </tfooter>
    @endif
</table>
