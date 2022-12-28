<x-modal.standart title="Data Penjualan Preorder" size="xl" id="modalPenjualanPreorderSet">
    <livewire:datatables.penjualan-preorder-set-table />
</x-modal.standart>
@push('scripts')
    <script>
        let modalPenjualanPreorder = new bootstrap.Modal(document.getElementById('modalPenjualanPreorderSet'))

        window.livewire.on('modalPenjualanPreorderHide', function () {
            modalPenjualanPreorder.hide()
        })

        window.livewire.on('modalPenjualanPreorderShow', function () {
            modalPenjualanPreorder.show()
        })
    </script>
@endpush
