<div>
    <x-card.standart class="mb-5 mt-5 mb-xl-8">
        <!--begin::Summary-->
        <div class="d-flex flex-center flex-column mb-5">
            <!--begin::Name-->
            <a href="#" class="fs-3 text-gray-800 text-hover-primary fw-bold mb-1">{{$nama_supplier}}</a>
            <!--end::Name-->
            <!--begin::Position-->
            <div class="fs-5 fw-semibold text-muted mb-6">{{ucwords(strtolower($regencies_name))}}</div>
            <!--end::Position-->
        </div>
        <!--end::Summary-->
        <!--begin::Details toggle-->
        <div class="d-flex flex-stack fs-4 py-3">
            <div class="fw-bold rotate collapsible" data-bs-toggle="collapse" href="#kt_customer_view_details" role="button" aria-expanded="false" aria-controls="kt_customer_view_details">Details
                <span class="ms-2 rotate-180">
                    <!--begin::Svg Icon-->
                    <span class="svg-icon svg-icon-3">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.4343 12.7344L7.25 8.55005C6.83579 8.13583 6.16421 8.13584 5.75 8.55005C5.33579 8.96426 5.33579 9.63583 5.75 10.05L11.2929 15.5929C11.6834 15.9835 12.3166 15.9835 12.7071 15.5929L18.25 10.05C18.6642 9.63584 18.6642 8.96426 18.25 8.55005C17.8358 8.13584 17.1642 8.13584 16.75 8.55005L12.5657 12.7344C12.2533 13.0468 11.7467 13.0468 11.4343 12.7344Z" fill="currentColor" />
                        </svg>
                    </span>
                    <!--end::Svg Icon-->
                    </span>
            </div>
            <span data-bs-toggle="tooltip" data-bs-trigger="hover" title="Edit customer details">
                <a href="#" class="btn btn-sm btn-light-primary" data-bs-toggle="modal" data-bs-target="#modalSupplierEdit">Edit</a>
            </span>
        </div>
        <!--end::Details toggle-->
        <!--begin::Details content-->
        <div id="kt_customer_view_details" class="collapse show">
            <div class="py-5 fs-6">
                <!--begin::Details item-->
                <div class="fw-bold mt-5">Account ID</div>
                <div class="text-gray-600">{{$kode}}</div>
                <!--end::Details item-->
                <!--begin::Details item-->
                <div class="fw-bold mt-5">Billing Email</div>
                <div class="text-gray-600">
                    <a href="#" class="text-gray-600 text-hover-primary">{{$email}}</a>
                </div>
                <!--end::Details item-->
                <!--begin::Details item-->
                <div class="fw-bold mt-5">Billing Address</div>
                <div class="text-gray-600">
                    {{$alamat}} <br>
                    {{ucwords(strtolower($regencies_name))}}
                </div>
                <!--end::Details item-->
                <!--begin::Details item-->
                <div class="fw-bold mt-5">Upcoming Invoice</div>
                <div class="text-gray-600">54238-8693</div>
                <!--end::Details item-->
                <!--begin::Details item-->
                <div class="fw-bold mt-5">Tax ID</div>
                <div class="text-gray-600">{{$npwp}}</div>
                <!--end::Details item-->
            </div>
        </div>
        <!--end::Details content-->
    </x-card.standart>
    <x-modal.standart id="modalSupplierEdit" title="Edit Supplier" wire:ignore.self>
        <x-input.group-horizontal label="Nama" name="nama_supplier">
            <x-input.text wire:model.defer="nama_supplier" />
        </x-input.group-horizontal>
        <x-input.group-horizontal label="Email" name="email">
            <x-input.text wire:model.defer="email"/>
        </x-input.group-horizontal>
        <x-input.group-horizontal label="Telepon" name="telepon">
            <x-input.text wire:model.defer="telepon" />
        </x-input.group-horizontal>
        <x-input.group-horizontal label="NPWP" name="npwp">
            <x-input.text wire:model.defer="npwp"/>
        </x-input.group-horizontal>
        <x-input.group-horizontal label="Alamat" name="alamat">
            <x-input.text wire:model.defer="alamat"/>
        </x-input.group-horizontal>
        <x-input.group-horizontal label="Kota / Kabupaten" name="regencies_id" wire:ignore>
            <x-input.text wire:model.defer="regencies_name" data-bs-toggle="modal" data-bs-target="#modalCitySet" readonly/>
        </x-input.group-horizontal>
        <x-input.group-horizontal label="Keterangan" name="keterangan">
            <x-input.text wire:model.defer="keterangan"/>
        </x-input.group-horizontal>
        <x-slot:footer>
            <x-button.btn-base wire:click="update">Update</x-button.btn-base>
        </x-slot:footer>
    </x-modal.standart>
    @push('scripts')
        <script>
            let supplierDetailModal = new bootstrap.Modal(document.getElementById('modalSupplierEdit'));
            window.livewire.on('modalSupplierDetailHide', function (){supplierDetailModal.hide()})
        </script>
    @endpush
</div>
