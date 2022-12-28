<x-modal.standart title="Data Pembelian" size="xl" id="modalPembelianSet">
    <livewire:datatables.pembelian-set-table />
</x-modal.standart>

@push('scripts')
    <script>
        let modalPembelian = new bootstrap.Modal(document.getElementById('modalPembelianSet'))

        window.livewire.on('modalPembelianHide', function () {
            modalPembelian.hide()
        })

        window.livewire.on('modalPembelianShow', function () {
            modalPembelian.show()
        })
    </script>
@endpush
