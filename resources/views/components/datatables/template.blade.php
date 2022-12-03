@props([
    'id'=>'docs',
    'idDatatable'=>'docsDatatable',
    'href'=>'#',
    'btnText'=> '',
    'btnCommand' => ''
])
<!--begin::Wrapper-->
<div class="d-flex flex-stack mb-5">
    <!--begin::Search-->
    <div class="d-flex align-items-center position-relative my-1">
            <span class="svg-icon svg-icon-1 position-absolute ms-6">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <rect opacity="0.5" x="17.0365" y="15.1223" width="8.15546" height="2" rx="1" transform="rotate(45 17.0365 15.1223)" fill="currentColor"></rect>
                    <path d="M11 19C6.55556 19 3 15.4444 3 11C3 6.55556 6.55556 3 11 3C15.4444 3 19 6.55556 19 11C19 15.4444 15.4444 19 11 19ZM11 5C7.53333 5 5 7.53333 5 11C5 14.4667 7.53333 17 11 17C14.4667 17 17 14.4667 17 11C17 7.53333 14.4667 5 11 5Z" fill="currentColor"></path>
                </svg>
            </span>
        <input type="text" data-kt-{{$id}}-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search"/>
    </div>
    <!--end::Search-->

    @if($btnText != null)
    <!--begin::Toolbar-->
    <div class="d-flex justify-content-end" data-kt-{{$id}}-table-toolbar="base">
        <!--begin::Add customer-->
        <x-button.btn-link-base href="{{$href}}" wire:click="{{$btnCommand}}" >
                    <span class="svg-icon svg-icon-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor"></rect>
                        </svg>
                    </span>
            {{ $btnText }}
        </x-button.btn-link-base>
        <!--end::Add customer-->
    </div>
    <!--end::Toolbar-->
    @endif
</div>
<!--end::Wrapper-->
<table id="{{$idDatatable}}" {{$attributes->class('table align-middle table-striped table-row-bordered fs-6 gy-5 gs-7')->merge()}} >
    <thead>
    <tr class="fw-semibold fs-6 text-gray-800">
        {{$slot}}
    </tr>
    </thead>
    <tbody></tbody>
</table>
