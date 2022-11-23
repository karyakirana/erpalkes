<div>
    <x-card.standart title="Form Customer" class="mt-5">
        <x-slot:toolbar>
            <h4>{{$kode}}</h4>
        </x-slot:toolbar>
        <div class="row">
            <div class="col-6">
                <x-input.group-vertical label="Nama" name="nama_customer">
                    <x-input.text wire:model.defer="nama_customer"/>
                </x-input.group-vertical>
            </div>
            <div class="col-3">
                <x-input.group-vertical label="Jenis Instansi" name="jenis_instansi">
                    <x-input.text wire:model.defer="jenis_instansi" />
                </x-input.group-vertical>
            </div>
            <div class="col-3">
                <x-input.group-vertical label="Area">
                    <x-input.text wire:model.defer="nama_area" />
                </x-input.group-vertical>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <x-input.group-vertical label="Alamat">
                    <x-input.text />
                </x-input.group-vertical>
            </div>
            <div class="col-3">
                <x-input.group-vertical label="Telepon">
                    <x-input.text />
                </x-input.group-vertical>
            </div>
            <div class="col-3">
                <x-input.group-vertical label="Email">
                    <x-input.text />
                </x-input.group-vertical>
            </div>
        </div>
        <div class="row">
            <div class="col-3">
                <x-input.group-vertical label="NPWP">
                    <x-input.text />
                </x-input.group-vertical>
            </div>
            <div class="col-3">
                <x-input.group-vertical label="Diskon">
                    <x-input.text />
                </x-input.group-vertical>
            </div>
            <div class="col-6">
                <x-input.group-vertical label="Keterangan">
                    <x-input.text />
                </x-input.group-vertical>
            </div>
        </div>
        <x-slot:footer>
            @if($update)
                <x-button.btn-base wire:click="update">Update</x-button.btn-base>
            @else
                <x-button.btn-base wire:click="store">Simpan</x-button.btn-base>
            @endif
        </x-slot:footer>
    </x-card.standart>
</div>
