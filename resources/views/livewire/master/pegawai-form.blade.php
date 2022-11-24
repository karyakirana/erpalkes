<div>
    <x-card.standart title="Form Pegawai" class="mt-5">
        <x-slot:toolbar>
            <h4>{{$kode}}</h4>
        </x-slot:toolbar>
        <div class="row">
            <div class="col-4">
                <x-input.group-vertical label="Nama" name="nama_pegawai">
                    <x-input.text wire:model.defer="nama_pegawai" />
                </x-input.group-vertical>
            </div>
            <div class="col-3">
                <x-input.group-vertical label="Gender" name="gender">
                    <x-input.select wire:model.defer="gender">
                        <option>Dipilih</option>
                        <option value="pria">Pria</option>
                        <option value="Wanita">Wanita</option>
                    </x-input.select>
                </x-input.group-vertical>
            </div>
            <div class="col-3">
                <x-input.group-vertical label="Jabatan" name="jabatan_nama">
                    @php
                        $jabatan = \App\Models\Master\Jabatan::query()->latest()->get();
                    @endphp
                    <x-input.select wire:model.defer="jabatan_nama">
                        <option>Dipilih</option>
                        @foreach($jabatan as $row)
                            <option value="{{$row->id}}">{{$row->nama_jabatan}}</option>
                        @endforeach
                    </x-input.select>
                </x-input.group-vertical>
            </div>
            <div class="col-2">
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <x-input.group-vertical label="Email" name="email">
                    <x-input.text wire:model.defer="email"/>
                </x-input.group-vertical>
            </div>
            <div class="col-3">
                <x-input.group-vertical label="Telepon" name="telepon">
                    <x-input.text wire:model.defer="telepon" />
                </x-input.group-vertical>
            </div>
            <div class="col-3">
                <x-input.group-vertical label="NPWP" name="npwp">
                    <x-input.text wire:model.defer="npwp"/>
                </x-input.group-vertical>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <x-input.group-vertical label="Alamat" name="alamat">
                    <x-input.text wire:model.defer="alamat"/>
                </x-input.group-vertical>
            </div>
            <div class="col-6">
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
</div>
