<x-modal.standart size="xl" id="modalSupplierSet" title="Data Supplier" wire:ignore.self>
    <livewire:supplier-set-table/>
</x-modal.standart>
@push('scripts')
    <script>

        let supplierSet = new bootstrap.Modal(document.getElementById('modalSupplierSet'));

        window.livewire.on('modalSupplierSetHide', function () {
            supplierSet.hide()
        })

        window.livewire.on('modalSupplierSetShow', function () {
            supplierSet.show()
        })
    </script>
@endpush
