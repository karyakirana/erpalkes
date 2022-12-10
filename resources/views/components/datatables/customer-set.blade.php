<x-modal.standart size="xl" id="modalCustomerSet" title="Data Customer" wire:ignore.self>
    <livewire:customer-set-table />
</x-modal.standart>
@push('scripts')
    <script>

        let customerSet = new bootstrap.Modal(document.getElementById('modalCustomerSet'));

        window.livewire.on('modalCustomerSetHide', function () {
            customerSet.hide()
        })

        window.livewire.on('modalCustomerSetShow', function () {
            customerSet.show()
        })
    </script>
@endpush
