<div>
    <x-modal.standart id="modalLokasiSet" title="Form Lokasi" size="lg" wire:ignore.self>
        <x-input.group-horizontal label="Lokasi" name="lokasi">
            <x-input.text wire:model.defer="lokasi"/>
        </x-input.group-horizontal>
        <x-input.group-horizontal label="Keterangan" name="keterangan">
            <x-input.text wire:model.defer="keterangan"/>
        </x-input.group-horizontal>
        <x-slot:footer>
            <x-button.btn-base wire:click="store">Store</x-button.btn-base>
        </x-slot:footer>
    </x-modal.standart>
    @push('scripts')
        <script>
            let modalLokasi = new bootstrap.Modal(document.getElementById('modalLokasiSet'));

            window.livewire.on('modalLokasiHide', function () {
                modalLokasi.hide()
            })

            window.livewire.on('modalLokasiShow', function () {
                modalLokasi.show()
            })

            document.getElementById('modalLokasiSet').addEventListener('hidden.bs.modal', function () {
                window.livewire.emit('resetForm')
            })
        </script>
    @endpush
</div>
