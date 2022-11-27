<x-modal.standart size="xl" id="modalCustomerSet" title="Data Customer" wire:ignore.self>
    <x-datatables.template
        id="customer"
        id-datatable="customerDatatable"
    >
        <th>Kode</th>
        <th>Instansi</th>
        <th>Area</th>
        <th>Customer</th>
        <th>Alamat</th>
        <th></th>
    </x-datatables.template>
</x-modal.standart>
@push('scripts')
    <script>
        let customerDatatables = function (){
            let table;
            let dt;

            let iniDatatable = function () {
                dt = $('#customerDatatable').DataTable({
                    searchDelay: 200,
                    processing: true,
                    order: [],
                    stateSave: false,
                    ajax: {
                        type: 'post',
                        url: "{{route('customer.datatables')}}"
                    },
                    columns: [
                        {data: 'kode'},
                        {data: 'jenis_instansi'},
                        {data: null},
                        {data: null},
                        {data: 'alamat'},
                        {data: null},
                    ],
                    columnDefs: [
                        {
                            targets: 2,
                            render: function () {
                                if(data.area == null){
                                    return ''
                                }
                                return data.salesArea.nama_area
                            }
                        },
                        {
                            targets: 3,
                            render: function () {
                                if(data.customer == null){
                                    return ''
                                }
                                return data.customer.nama_customer
                            }
                        },
                        {
                            targets: -1,
                            orderable: false,
                            className: 'text-center',
                            render: function (data, type, row) {
                                return `
                                    <button type="button" class="btn btn-light btn-active-light-primary" onclick="setCustomer(`+data.id+`)">SET</button>
                                `
                            }
                        }
                    ]
                })

                table = dt.$;

                dt.on('draw', function () {
                    KTMenu.createInstances();
                })


            }
            // search
            let handleSearch = function () {
                const filterSearch = document.querySelector('[data-kt-customer-table-filter="search"]');
                filterSearch.addEventListener('keyup', function (e){
                    dt.search(e.target.value).draw()
                });
            }

            return {
                init: function (){
                    iniDatatable();
                    handleSearch();
                }
            }
        }();

        // On document ready
        KTUtil.onDOMContentLoaded(function () {
            customerDatatables.init();
        });

        function refreshCustomerDatatables()
        {
            $('#customerDatatable').DataTable().ajax.reload()
        }

        function setCustomer(id)
        {
            window.livewire.emit('setCustomer', id)
        }

        let modalCustomerSet = new bootstrap.Modal(document.getElementById('modalCustomerSet'));

        window.livewire.emit('modalCustomerSetHide', function () {
            modalCustomerSet.hide()
        })

        window.livewire.emit('modalCustomerSetShow', function () {
            modalCustomerSet.show()
        })
    </script>
@endpush
