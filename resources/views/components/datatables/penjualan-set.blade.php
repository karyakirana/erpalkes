<x-modal.standart title="Data Penjualan" size="xl" id="modalPenjualanSet">
    <livewire:datatables.penjualan-set-table />
</x-modal.standart>
@push('scripts')
    <script>
        let modalPenjualan = new bootstrap.Modal(document.getElementById('modalPenjualanSet'))

        window.livewire.on('modalPenjualanHide', function () {
            modalPenjualan.hide()
        })

        window.livewire.on('modalPenjualanShow', function () {
            modalPenjualan.show()
        })
    </script>
@endpush
