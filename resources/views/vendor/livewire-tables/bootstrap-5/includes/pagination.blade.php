@if ($showPagination)
    @if ($paginationEnabled && $rows->lastPage() > 1)
        <div class="row align-middle">
            <div class="col-12 col-md-8">
                {{ $rows->links() }}
            </div>

            <div class="col-12 col-md-4 text-center text-md-end text-muted">
                <span>@lang('Showing')</span>
                <strong>{{ $rows->count() ? $rows->firstItem() : 0 }}</strong>
                <span>@lang('to')</span>
                <strong>{{ $rows->count() ? $rows->lastItem() : 0 }}</strong>
                <span>@lang('of')</span>
                <strong>{{ $rows->total() }}</strong>
                <span>@lang('results')</span>
            </div>
        </div>
    @else
        <div class="row">
            <div class="col-12 text-muted">
                @lang('Showing')
                <strong>{{ $rows->count() }}</strong>
                @lang('results')
            </div>
        </div>
    @endif
@endif
