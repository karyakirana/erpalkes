<x-modal.standart title="Data Kota" id="modalCitySet" size="xl" wire:ignore.self>
    <livewire:datatables.kota-table />
</x-modal.standart>

@push('scripts')
    <script>
        let modalCitySet = new bootstrap.Modal(document.getElementById('modalCitySet'));

        window.livewire.on('modalCitySetHide', function (){modalCitySet.hide()})
        window.livewire.on('modalCitySetShow', function (){modalCitySet.show()})
    </script>
@endpush
