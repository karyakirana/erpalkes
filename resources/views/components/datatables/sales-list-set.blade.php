<x-modal.standart title="Data Sales" size="xl" id="modalSalesList">
    <livewire:datatables.sales-list-set-table />
</x-modal.standart>

@push('scripts')
    <script>
        let modalSalesList = new bootstrap.Modal(document.getElementById('modalSalesList'));

        window.livewire.on('modalSalesListHide', function () {
            modalSalesList.hide()
        })
        window.livewire.on('modalSalesListShow', function () {
            modalSalesList.show()
        })
    </script>
@endpush
