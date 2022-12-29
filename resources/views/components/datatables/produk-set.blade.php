<x-modal.standart size="xl" id="modalProdukSet" wire:ignore.self title="Data Produk">
    <livewire:datatables.produk-list-set />
</x-modal.standart>

@push('scripts')
    <script>
        let modalProduk = new bootstrap.Modal(document.getElementById('modalProdukSet'));

        window.livewire.on('modalProdukSetHide', function () {
            modalProduk.hide()
        })
    </script>
@endpush
