<div>
    <x-card.standart title="Form Supplier" class="mt-5">
        <x-slot:toolbar>
            <h4>{{$kode}}</h4>
        </x-slot:toolbar>
        @if($errors->all())
            <x-alert.danger>
                <ul>
                    @foreach($errors->all() as $messages)
                        <li>{{$messages}}</li>
                    @endforeach
                </ul>
            </x-alert.danger>
        @endif
        <div class="row">
            <div class="col-4">
                <x-input.group-vertical label="Nama" name="nama_supplier">
                    <x-input.text wire:model.defer="nama_supplier" />
                </x-input.group-vertical>
            </div>
            <div class="col-2">
                <x-input.group-vertical label="Telepon" name="telepon">
                    <x-input.text wire:model.defer="telepon" />
                </x-input.group-vertical>
            </div>
            <div class="col-3">
                <x-input.group-vertical label="Email" name="email">
                    <x-input.text wire:model.defer="email"/>
                </x-input.group-vertical>
            </div>
            <div class="col-3">
                <x-input.group-vertical label="NPWP" name="npwp">
                    <x-input.text wire:model.defer="npwp"/>
                </x-input.group-vertical>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <x-input.group-vertical label="Alamat" name="alamat">
                    <x-input.text wire:model.defer="alamat"/>
                </x-input.group-vertical>
            </div>
            <div class="col-4">
                <x-input.group-vertical label="Kota" name="regencies_id" wire:ignore>
                    <x-input.text wire:model.defer="regencies_name" data-bs-toggle="modal" data-bs-target="#modalCitySet" readonly/>
                </x-input.group-vertical>
            </div>
        </div>
        <div class="row">
            <div class="col-8">
                <x-input.group-vertical label="Keterangan" name="keterangan">
                    <x-input.text wire:model.defer="keterangan"/>
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
    <x-datatables.city-set />
    @push('scripts')
        <script>

        </script>
    @endpush
</div>
