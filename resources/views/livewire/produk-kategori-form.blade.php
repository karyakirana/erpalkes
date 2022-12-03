<div>
    <!--begin::modal-->
    <x-modal.standart id="modalProdukKategori" size="lg" title="Form Kategori" wire:ignore.self>
        <!--begin::form -->
        <x-input.group-horizontal label="Kode" name="kode">
            <x-input.text wire:model.defer="kode" disabled />
        </x-input.group-horizontal>
        <x-input.group-horizontal label="Kategori" name="kategori">
            <x-input.text wire:model.defer="kategori" />
        </x-input.group-horizontal>
        <x-input.group-horizontal label="Keterangan" name="keterangan">
            <x-input.text wire:model.defer="keterangan" />
        </x-input.group-horizontal>
        <!--end::form -->
        <x-slot:footer>
            @if($update)
                <x-button.btn-base wire:click="update">Update</x-button.btn-base>
            @else
                <x-button.btn-base wire:click="store">Simpan</x-button.btn-base>
            @endif
        </x-slot:footer>
    </x-modal.standart>
    <!--end::modal-->
    @push('scripts')
        <script>
            const modalsArea = new bootstrap.Modal(document.getElementById('modalProdukKategori'));

            window.livewire.on('modalProdukKategoriHide', function () {
                modalsArea.hide()
            })

            window.livewire.on('modalProdukKategoriShow', function (){
                modalsArea.show()
            })

            document.getElementById('modalProdukKategori').addEventListener('hidden.bs.modal', event => {
                Livewire.emit('resetForm')
                refreshDatatables()
            })

        </script>
    @endpush
</div>
