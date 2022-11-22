<div>
    <table id="customerDatatable" class="table table-bordered">
        <thead>
            <tr>
                <th>Kode</th>
                <th>Instansi</th>
                <th>Area</th>
                <th>Customer</th>
                <th></th>
            </tr>
        </thead>
        <tbody></tbody>
    </table>

    @push('scripts')
        <script>
            document.addEventListener("DOMContentLoaded", function() {
                // code...
            });

            // class definition
            let CustomerList = function () {
                // define shared variables
                var datatable;
                var table;

                // private functions
                var initCustomerList = function () {

                    // init datatable
                    datatable = $(table).DataTable({
                        info: false,
                        order: [],
                        columnDefs: [
                            { orderable: false, targets: -1 }
                        ]
                    })

                    // Re-init functions on every table re-draw
                    datatable.on('draw', function (){
                        //
                    })
                }

                // search datatable
                var handleSearchDatatable = () => {
                    const filterSearch = document.querySelector('[data-customer-table-filter="search"]')
                    filterSearch.addEventListener('keyUp', function (e) {
                        datatable.search(e.target.value).draw()
                    })
                }

                // public methods
                return {
                    init: function(){
                        table = document.querySelector('#customerDatatable')

                        if (!table) {
                            return
                        }

                        initCustomerList()
                    }
                }
            }

            let tableCustomer = $('#customerDatatable').DataTable({
                processing: true,
                serverSide: true,
            })

            KTUtil.onDOMContentLoaded(function () {
                CustomerList.init()
            })

        </script>
    @endpush
</div>
