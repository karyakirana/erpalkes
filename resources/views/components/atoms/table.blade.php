@props(['head'=>null, 'footer'=>null])
<table {{$attributes->class('table align-middle table-row-bordered fs-6 gy-5 gs-7')->merge()}}>
    <thead class="text-center fw-bold ">
        {{$head}}
    </thead>
    <tbody  class="text-center">
        {{$slot}}
    </tbody >
    @if($footer)
        <tfoot>
        {{$footer}}
        </tfoot>
    @endif
</table>
