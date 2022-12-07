<div>
    <x-card.standart class="mt-5">
        <div class="d-flex flex-center flex-column mb-5">
            <!--begin::Name-->
            <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">{{$nama_customer}}</a>
            <!--end::Name-->
            <!--begin::Position-->
            <div class="fs-5 fw-semibold text-muted mb-6">{{$jenis_instansi}}</div>
            <!--end::Position-->
        </div>
        <div class="d-flex flex-stack fs-4 py-3">
            <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_customer_view_details" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">Details
                <span class="ms-2 rotate-180">
                    <!--begin::Svg Icon | path: icons/duotune/arrows/arr072.svg-->
                    <span class="svg-icon svg-icon-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor"></path>
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                </span>
            </div>
            <span data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-original-title="Edit customer details" data-kt-initialized="1">
                <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#kt_modal_update_customer">Edit</a>
            </span>
        </div>
        <div id="kt_customer_view_details" class="collapse show">
            <div class="py-5 fs-6">
                <!--begin::Details item-->
                <div class="fw-bold mt-5">Account ID</div>
                <div class="text-gray-600">{{$kode}}</div>
                <!--begin::Details item-->
                <!--begin::Details item-->
                <div class="fw-bold mt-5">Billing</div>
                <div class="text-gray-600">
                    <a href="#" class="text-gray-600 text-hover-primary">{{$email}}</a>
                    {{$telepon}}
                </div>
                <!--begin::Details item-->
                <!--begin::Details item-->
                <div class="fw-bold mt-5">Billing Address</div>
                <div class="text-gray-600">
                    {{$alamat}} <br>
                    {{$regencies_name}}
                </div>
                <!--begin::Details item-->
                <!--begin::Details item-->
                <div class="fw-bold mt-5">Upcoming Invoice</div>
                <div class="text-gray-600">54238-8693</div>
                <!--begin::Details item-->
                <!--begin::Details item-->
                <div class="fw-bold mt-5">Tax ID</div>
                <div class="text-gray-600">{{$npwp}}</div>
                <!--begin::Details item-->
            </div>
        </div>
    </x-card.standart>
</div>
