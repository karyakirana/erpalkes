<div>
    <div class="row">
        <div class="col-8"></div>
        <div class="col-4"></div>
    </div>
    <x-card.standart title="Form Pegawai" class="mt-5">
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
        <x-input.group-horizontal label="Nama" name="nama_pegawai">
            <x-input.text wire:model.defer="nama_pegawai" />
        </x-input.group-horizontal>
        <x-input.group-horizontal label="Gender" name="gender">
            <x-input.select wire:model.defer="gender">
                <option>Dipilih</option>
                <option value="pria">Pria</option>
                <option value="Wanita">Wanita</option>
            </x-input.select>
        </x-input.group-horizontal>
        <x-input.group-horizontal label="Jabatan" name="jabatan_nama">
            @php
                $jabatan = \App\Models\Master\Jabatan::query()->latest()->get();
            @endphp
            <x-input.select wire:model.defer="jabatan_id">
                <option>Dipilih</option>
                @foreach($jabatan as $row)
                    <option value="{{$row->id}}">{{$row->nama_jabatan}}</option>
                @endforeach
            </x-input.select>
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
        <x-input.group-horizontal label="Kota / Kabupaten" name="regencies_name">
            <x-input.text wire:model.defer="regencies_name" wire:click="$emit('modalCitySetShow')" readonly/>
        </x-input.group-horizontal>
        <x-input.group-horizontal label="Keterangan" name="keterangan">
            <x-input.text wire:model.defer="keterangan"/>
        </x-input.group-horizontal>
        <x-datatables.city-set />
        <x-slot:footer>
            @if($update)
                <x-button.btn-base wire:click="update">Update</x-button.btn-base>
            @else
                <x-button.btn-base wire:click="store">Simpan</x-button.btn-base>
            @endif
        </x-slot:footer>
    </x-card.standart>
</div>
