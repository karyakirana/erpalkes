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
    @if(session()->has('message'))
        <x-alert.danger>
            {{session('message')}}
        </x-alert.danger>
    @endif
    <x-card.standart class="mt-5" title="Form Persediaan Awal">
        <div class="row">
            <div class="col-md-4">
                <x-input.group-vertical class="mb-4" label="Produk" name="produk_nama">
                    <x-input.textarea wire:model.defer="produk_nama" data-bs-toggle="modal" data-bs-target="#modalProdukSet" readonly/>
                </x-input.group-vertical>
                <div class="form-check form-switch form-check-custom form-check-solid mb-4">
                    <input class="form-check-input" type="checkbox" value="" id="flexSwitchDefault" wire:model="is_expired"/>
                    <label class="form-check-label" for="flexSwitchDefault">
                        Produk Expired
                    </label>
                </div>
                <div class="row">
                    <div class="col-6">
                        <x-input.group-vertical class="mb-4" label="Harga" name="harga">
                            <x-input.text wire:model="harga"/>
                        </x-input.group-vertical>
                    </div>
                    <div class="col-6">
                        <x-input.group-vertical class="mb-4" label="Jumlah" name="jumlah">
                            <x-input.text wire:model="jumlah"/>
                        </x-input.group-vertical>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-6">
                        <x-input.group-vertical class="mb-4" label="Exp" name="tgl_expired">
                            <x-input.single-daterange wire:model="tgl_expired" id="tgl_expired" />
                        </x-input.group-vertical>
                    </div>
                    <div class="col-6">
                        <x-input.group-vertical class="mb-4" label="Batch" name="batch">
                            <x-input.text wire:model.defer="batch"/>
                        </x-input.group-vertical>
                    </div>
                </div>
                <x-input.group-vertical label="Sub Total" name="sub_total">
                    <x-input.text value="{{rupiah_format($sub_total)}}" readonly/>
                </x-input.group-vertical>
                @if($update)
                    <x-button.btn-base wire:click="updateLine">Update Produk</x-button.btn-base>
                @else
                    <x-button.btn-base wire:click="addLine">Add Produk</x-button.btn-base>
                @endif
            </div>
            <div class="col-md-8">
                <!-- begin::input row -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <x-input.group-vertical label="Kondisi" name="kondisi">
                            <x-input.select wire:model.defer="kondisi">
                                <option>Dipilih</option>
                                <option value="baik">Baik</option>
                                <option value="rusak">Rusak</option>
                            </x-input.select>
                        </x-input.group-vertical>
                    </div>
                    <div class="col-md-6">
                        <x-input.group-vertical label="Lokasi" name="gudang_id">
                            <x-input.select wire:model.defer="gudang_id">
                                <option>Dipilih</option>
                                @foreach($dataGudang as $row)
                                    <option value="{{$row->id}}">{{$row->lokasi}}</option>
                                @endforeach
                            </x-input.select>
                        </x-input.group-vertical>
                    </div>
                </div>
                <!-- end::input row -->
                <!-- begin::input row -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <x-input.group-vertical label="Tanggal" name="tgl_persediaan">
                            <x-input.single-daterange id="tgl_persediaan_awal" wire:model.defer="tgl_persediaan_awal" />
                        </x-input.group-vertical>
                    </div>
                    <div class="col-md-6">
                        <x-input.group-vertical label="Keterangan" name="keterangan">
                            <x-input.text wire:model.defer="keterangan"/>
                        </x-input.group-vertical>
                    </div>
                </div>
                <!-- end::input row -->
                <!-- begin::table -->
                <div class="table-responsive">
                    <table class="table table-row-bordered">
                        <thead>
                            <tr class="fw-bold fs-6 text-gray-800">
                                <th width="50%">Deskripsi</th>
                                <th width="15%" class="text-center">Jumlah</th>
                                <th width="20%" class="text-end">Sub Total</th>
                                <th width="15%"></th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($dataDetail as $index => $row)
                                <tr>
                                    <td>
                                        {{$row['produk_nama']}}
                                        @if($row['tgl_expired'])
                                            <br>expired : {{$row['tgl_expired']}}
                                        @endif
                                        <br>Harga : {{rupiah_format($row['harga'])}}
                                    </td>
                                    <td class="text-center">
                                        {{$row['jumlah']}}
                                    </td>
                                    <td class="text-end">
                                        {{rupiah_format($row['sub_total'])}}
                                    </td>
                                    <td>
                                        <x-button.btn-icon-edit wire:click="editLine({{$index}})" />
                                        <x-button.btn-icon-delete wire:click="removeLine({{$index}})" />
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td class="text-center" colspan="5">Tidak Ada Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <!-- end::table -->
            </div>
        </div>
        <x-slot:footer>
            <div class="text-end">
                @if($mode == "update")
                    <x-button.btn-base wire:click="update">Update</x-button.btn-base>
                @else
                    <x-button.btn-base wire:click="store">Store</x-button.btn-base>
                @endif
            </div>

        </x-slot:footer>
    </x-card.standart>

    <x-datatables.produk-set />

    @push('scripts')
        <script>
            $('#tgl_persediaan_awal').on('change', function (e) {
                @this.tgl_persediaan_awal = e.target.value;
            })

            $('#tgl_expired').on('change', function (e) {
                @this.tgl_expired = e.target.value;
            })
        </script>
    @endpush
</div>
