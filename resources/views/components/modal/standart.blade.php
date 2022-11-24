@props([
    'title'=>null,
    'size'=>'xl',
    'footer'=>null
])
<div {{$attributes->class('modal fade')->merge()}} tabindex="-1">
    <div class="modal-dialog modal-dialog-centered modal-{{$size}}">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title">{{$title}}</h3>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
                    <span class="svg-icon svg-icon-1">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="6" y="17.3137" width="16" height="2" rx="1" transform="rotate(-45 6 17.3137)" fill="currentColor"></rect>
                            <rect x="7.41422" y="6" width="16" height="2" rx="1" transform="rotate(45 7.41422 6)" fill="currentColor"></rect>
                        </svg>
                    </span>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">
                {{$slot}}
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-bs-dismiss="modal">Close</button>
                {{$footer}}
            </div>
        </div>
    </div>
</div>
