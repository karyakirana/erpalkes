<div>
    @if($errors->all())
        <x-alert.danger>
            <ul>
                @foreach($errors->all() as $messages)
                    <li>{{$messages}}</li>
                @endforeach
            </ul>
        </x-alert.danger>
    @endif
    <x-card.standart class="mt-5" title="Form Area">
        <x-slot:toolbar>
            <x-button.btn-base data-bs-toggle="modal" data-bs-target="#modalCitySet">Tambah Kota</x-button.btn-base>
        </x-slot:toolbar>
        <div class="row">
            <div>
                <div class="row">
                    <div class="col-6">
                        <x-input.group-horizontal label="Area" name="nama">
                            <x-input.text wire:model.defer="nama"/>
                        </x-input.group-horizontal>

                    </div>
                    <div class="col-6">
                        <x-input.group-horizontal label="Pegawai" name="pegawai_nama">
                            <x-input.text wire:model.defer="pegawai_nama" data-bs-toggle="modal" data-bs-target="#modalPegawaiSet" readonly/>
                        </x-input.group-horizontal>
                    </div>
                </div>
                <!--begin::table-->
                <div class="table-responsive">
                    <table class="table align-middle table-row-bordered gx-4">
                        <thead>
                            <tr class="fw-bold fs-6 text-gray-800">
                                <th width="15%">Nomor</th>
                                <th width="30%">Provinsi</th>
                                <th width="30%">Kota/Kabupaten</th>
                                <th width="25"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dataDetail as $index => $row)
                                <tr>
                                    <td>{{$loop->iteration}}</td>
                                    <td>{{$row['provinces_name']}}</td>
                                    <td>{{$row['kota_nama']}}</td>
                                    <td width="10%">
                                        <x-button.btn-icon-delete wire:click="removeLine({{$index}})" />
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4" class="text-center">Tidak Ada Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!--end::table-->
            </div>
        </div>
        <x-slot:footer>
            @if($update)
                <x-button.btn-base wire:click="update">Update</x-button.btn-base>
            @else
                <x-button.btn-base wire:click="store">Store</x-button.btn-base>
            @endif
        </x-slot:footer>
    </x-card.standart>
    <x-datatables.city-set />
    <x-datatables.pegawai-set />
    @push('scripts')
    @endpush
</div>
