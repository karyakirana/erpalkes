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
            <x-input.group-horizontal label="Nama" name="nama">
                <x-input.text wire:model.defer="nama" />
            </x-input.group-horizontal>
            <x-input.group-horizontal label="Email" name="email">
                <x-input.text wire:model.defer="email"/>
            </x-input.group-horizontal>
            <x-input.group-horizontal label="Telepon" name="telepon">
                <x-input.text wire:model.defer="telepon" />
            </x-input.group-horizontal>
            <x-input.group-horizontal label="NPWP" name="npwp">
                <x-input.text wire:model.defer="npwp"/>
            </x-input.group-horizontal>
            <x-input.group-horizontal label="Alamat" name="alamat">
                <x-input.text wire:model.defer="alamat"/>
            </x-input.group-horizontal>
            <x-input.group-horizontal label="Kota / Kabupaten" name="regencies_id" wire:ignore>
                <x-input.text wire:model.defer="regencies_name" data-bs-toggle="modal" data-bs-target="#modalCitySet" readonly/>
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
    </x-card.standart>
    <x-datatables.city-set />
    @push('scripts')
        <script>

        </script>
    @endpush
</div>
