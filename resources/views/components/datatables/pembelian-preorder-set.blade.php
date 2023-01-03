<x-modal.standart title="Data Pembelian Preorder" size="xl" id="modalPembelianPreorderSet">
    <livewire:datatables.pembelian-preorder-set-table />
</x-modal.standart>
@push('scripts')
    <script>
        let modalPembelianPreorder = new bootstrap.Modal(document.getElementById('modalPembelianPreorderSet'))

        window.livewire.on('modalPembelianPreorderHide', function () {
            modalPembelianPreorder.hide()
        })

        window.livewire.on('modalPembelianPreorderShow', function () {
            modalPembelianPreorder.show()
        })
    </script>
@endpush
