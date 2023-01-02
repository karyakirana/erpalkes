<x-modal.standart size="xl" id="modalSalesList">
    <livewire:datatables.sales-list-set-table />
</x-modal.standart>

@push('scripts')
    <script>
        let modalSales = new bootstrap.Modal(document.getElementById('modalSalesList'));

        window.livewire.on('modalSalesHide', function () {
            modalSales.hide()
        })
    </script>
@endpush
