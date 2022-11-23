<div>
    <!--begin::modal-->
    <x-modal.standart id="modalJabatan" size="lg" title="Form Jabatan" wire:ignore.self>
        <!--begin::form -->
        <x-input.group-horizontal label="Kode" name="kode">
            <x-input.text wire:model.defer="kode" disabled />
        </x-input.group-horizontal>
        <x-input.group-horizontal label="Jabatan" name="nama_jabatan">
            <x-input.text wire:model.defer="nama_jabatan" />
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
            const modalsJabatan = new bootstrap.Modal(document.getElementById('modalJabatan'));

            window.livewire.on('modalJabatanHide', function () {
                modalsJabatan.hide()
            })

            window.livewire.on('modalJabatanShow', function (){
                modalsJabatan.show()
            })

            document.getElementById('modalJabatan').addEventListener('hidden.bs.modal', event => {
                Livewire.emit('resetForm')
                refreshDatatables()
            })

        </script>
    @endpush
</div>
