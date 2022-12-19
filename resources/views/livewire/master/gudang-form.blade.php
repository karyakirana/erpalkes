<div>
    <x-modal.standart id="modalGudang" title="Form Gudang" wire:ignore.self>
        <x-input.group-horizontal label="Gudang" name="nama">
            <x-input.text wire:model.defer="nama" />
        </x-input.group-horizontal>
        <x-input.group-horizontal label="Keterangan" name="keterangan">
            <x-input.text wire:model.defer="keterangan"/>
        </x-input.group-horizontal>
        <x-slot:footer>
            @if($update)
                <x-button.btn-base wire:click="update">Update</x-button.btn-base>
            @else
                <x-button.btn-base wire:click="store">Simpan</x-button.btn-base>
            @endif
        </x-slot:footer>
    </x-modal.standart>
    @push('scripts')
        <script>
            let formGudang = new bootstrap.Modal(document.getElementById('modalGudang'))

            window.livewire.on('formGudangHide', function(){
                formGudang.hide()
            })

            window.livewire.on('formGudangShow', function(){
                formGudang.show()
            })

            document.getElementById('modalGudang').addEventListener('hidden.bs.modal', function () {
                window.livewire.emit('resetForm')
            })
        </script>
    @endpush
</div>
