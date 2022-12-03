<x-metronics-layout>
    <x-card.standart title="Data Penjualan" class="mt-5">
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
                <input type="text" data-kt-penjualan-table-filter="search" class="form-control form-control-solid w-250px ps-15" placeholder="Search Customers"/>
            </div>
            <!--end::Search-->

            <!--begin::Toolbar-->
            <div class="d-flex justify-content-end" data-kt-penjualan-table-toolbar="base">
                <!--begin::Add customer-->
                <x-button.btn-link-base href="{{route('penjualan.form')}}">
                    <span class="svg-icon svg-icon-2">
                        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <rect opacity="0.5" x="11.364" y="20.364" width="16" height="2" rx="1" transform="rotate(-90 11.364 20.364)" fill="currentColor"></rect>
                            <rect x="4.36396" y="11.364" width="16" height="2" rx="1" fill="currentColor"></rect>
                        </svg>
                    </span>
                    Add Penjualan
                </x-button.btn-link-base>
                <!--end::Add customer-->
            </div>
            <!--end::Toolbar-->
        </div>
        <!--end::Wrapper-->
        <table id="penjualanDatatable" class="table align-middle table-striped table-row-bordered fs-6 gy-5 gs-7">
            <thead>
            <tr class="fw-semibold fs-6 text-gray-800">
                <th>Kode</th>
                <th>Customer</th>
                <th>Tanggal</th>
                <th>Jumlah Barang</th>
                <th>Total Bayar</th>
                <th>Sales</th>
                <th>Status</th>
                <th></th>
            </tr>
            </thead>
            <tbody></tbody>
        </table>
    </x-card.standart>

    @push('scripts')
        <script>
            "use strict";

            // Class definition
            var KTDatatablesServerSide = function () {
                // Shared variables
                let table;
                let dt;
                let filterPayment;

                // Private functions
                let initDatatable = function () {
                    dt = $("#penjualanDatatable").DataTable({
                        searchDelay: 500,
                        processing: true,
                        serverSide: true,
                        order: [],
                        stateSave: false,
                        ajax: {
                            type: 'post',
                            url: "{{route('penjualan.datatables')}}",
                        },
                        columns: [
                            { data: 'kode' },
                            { data: 'customer_id' },
                            { data: 'tgl_nota' },
                            { data: 'sales_id' },
                            { data: 'status_invoice' },
                            { data: 'total_bayar' },
                            { data: 'keterangan' },
                            { data: null },
                        ],
                        columnDefs: [
                            {
                                targets: -1,
                                data: null,
                                orderable: false,
                                className: 'text-end',
                                render: function (data, type, row) {
                                    return `
                            <a href="#" class="btn btn-light btn-active-light-primary btn-sm" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end" data-kt-menu-flip="top-end">
                                Actions
                                <span class="svg-icon svg-icon-5 m-0">
                                    <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 24 24" version="1.1">
                                        <g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <polygon points="0 0 24 0 24 24 0 24"></polygon>
                                            <path d="M6.70710678,15.7071068 C6.31658249,16.0976311 5.68341751,16.0976311 5.29289322,15.7071068 C4.90236893,15.3165825 4.90236893,14.6834175 5.29289322,14.2928932 L11.2928932,8.29289322 C11.6714722,7.91431428 12.2810586,7.90106866 12.6757246,8.26284586 L18.6757246,13.7628459 C19.0828436,14.1360383 19.1103465,14.7686056 18.7371541,15.1757246 C18.3639617,15.5828436 17.7313944,15.6103465 17.3242754,15.2371541 L12.0300757,10.3841378 L6.70710678,15.7071068 Z" fill="currentColor" fill-rule="nonzero" transform="translate(12.000003, 11.999999) rotate(-180.000000) translate(-12.000003, -11.999999)"></path>
                                        </g>
                                    </svg>
                                </span>
                            </a>
                            <!--begin::Menu-->
                            <div class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-bold fs-7 w-125px py-4" data-kt-menu="true">
                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" onclick="edit(`+data.id+`)" class="menu-link px-3" data-kt-penjualan-table-filter="edit_row">
                                        Edit
                                    </a>
                                </div>
                                <!--end::Menu item-->

                                <!--begin::Menu item-->
                                <div class="menu-item px-3">
                                    <a href="#" onclick="destroy(`+data.id+`)" class="menu-link px-3" data-kt-penjualan-table-filter="delete_row">
                                        Delete
                                    </a>
                                </div>
                                <!--end::Menu item-->
                            </div>
                            <!--end::Menu-->
                        `;
                                },
                            },
                        ],
                    });

                    table = dt.$;

                    // Re-init functions on every table re-draw -- more info: https://datatables.net/reference/event/draw
                    dt.on('draw', function () {
                        KTMenu.createInstances();
                    });
                }

                // Search Datatable --- official docs reference: https://datatables.net/reference/api/search()
                let handleSearchDatatable = function () {
                    const filterSearch = document.querySelector('[data-kt-penjualan-table-filter="search"]');
                    filterSearch.addEventListener('keyup', function (e) {
                        dt.search(e.target.value).draw();
                    });
                }

                // Public methods
                return {
                    init: function () {
                        initDatatable();
                        handleSearchDatatable();
                    }
                }
            }();

            // On document ready
            KTUtil.onDOMContentLoaded(function () {
                KTDatatablesServerSide.init();
            });

            function refreshDatatables()
            {
                $('#penjualanDatatable').DataTable().ajax.reload()
            }

            function destroy(id)
            {
                Swal.fire({
                    title : 'Apakah Anda yakin?',
                    text : 'Data yang dihapus tidak dapat dikembalikan',
                    icon : 'warning',
                    showCancelButton : true,
                    confirmButton : '#3085d6',
                    cancelButton : '#d33',
                    confirmButtonText : 'Yes, delete!'
                }).then((result)=>{
                    if(result.isConfirmed){
                        $.ajax({
                            url : '{{route("penjualan.destroy")}}',
                            method : 'delete',
                            data : {
                                id : id
                            },
                            success : function (response){
                                Swal.fire(
                                    'Deleted'
                                )
                                refreshDatatables()
                            }
                        })
                    }
                })
            }

            function edit(id)
            {
                window.livewire.emit('edit', id);
            }

        </script>
    @endpush
</x-metronics-layout>
