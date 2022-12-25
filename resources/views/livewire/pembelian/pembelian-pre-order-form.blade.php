<div>
    <x-card.standart class="mt-5" title="Form Penjualan Pre Order">
        <div class="row">
            <div class="col-md-4">
                <x-input.group-vertical class="mb-4" label="Supplier">
                    <x-input.textarea wire:model.defer=""/>
                </x-input.group-vertical>
                <div class="row">
                    <div class="col-6">
                        <x-input.group-vertical class="mb-4" label="Harga">
                            <x-input.text wire:model.defer=""/>
                        </x-input.group-vertical>
                    </div>
                    <div class="col-6">
                        <x-input.group-vertical class="mb-4" label="Jumlah">
                            <x-input.text wire:model.defer=""/>
                        </x-input.group-vertical>
                    </div>
                </div>
                <div class="row mb-4">
                    <div class="col-6">
                        <x-input.group-vertical class="mb-4" label="Exp">
                            <x-input.text wire:model.defer=""/>
                        </x-input.group-vertical>
                    </div>
                    <div class="col-6">
                        <x-input.group-vertical class="mb-4" label="Batch">
                            <x-input.text wire:model.defer=""/>
                        </x-input.group-vertical>
                    </div>
                </div>
                <x-input.group-vertical label="Sub Total">
                    <x-input.text wire:model.defer=""/>
                </x-input.group-vertical>
            </div>
            <div class="col-md-8">
                <!-- begin::input row -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <x-input.group-vertical label="Kondisi">
                            <x-input.select wire:model.defer="">
                                <option value="baik">Baik</option>
                                <option value="rusak">Rusak</option>
                            </x-input.select>
                        </x-input.group-vertical>
                    </div>
                    <div class="col-md-6">
                        <x-input.group-vertical label="Gudang">
                            <x-input.select wire:model.defer="">
                                {{--                                @foreach($dataGudang as $row)--}}
                                {{--                                    <option value="{{$row->id}}">{{$row->nama}}</option>--}}
                                {{--                                @endforeach--}}
                            </x-input.select>
                        </x-input.group-vertical>
                    </div>
                </div>
                <!-- end::input row -->
                <!-- begin::input row -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <x-input.group-vertical label="Tanggal">
                        </x-input.group-vertical>
                    </div>
                    <div class="col-md-6">
                        <x-input.group-vertical label="Keterangan">
                            <x-input.text wire:model.defer=""/>
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
                            <th width="20%">Jumlah</th>
                            <th width="20%">Sub Total</th>
                            <th width="10%"></th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--                        @forelse($dataDetail as $index => $row)--}}
                        {{--                            <tr>--}}
                        {{--                                <td>--}}
                        {{--                                    {{$row['produk_nama']}}--}}
                        {{--                                    @if($row['tgl_expired'])--}}
                        {{--                                        <br> {{$row['tgl_expired']}}--}}
                        {{--                                    @endif--}}
                        {{--                                    <br> {{$row->harga}}--}}
                        {{--                                </td>--}}
                        {{--                                <td>--}}
                        {{--                                    {{$row['jumlah']}}--}}
                        {{--                                </td>--}}
                        {{--                                <td>--}}
                        {{--                                    {{$row['sub_total']}}--}}
                        {{--                                </td>--}}
                        {{--                                <td>--}}
                        {{--                                    {{$index}}--}}
                        {{--                                </td>--}}
                        {{--                            </tr>--}}
                        {{--                        @empty--}}
                        {{--                            <tr>--}}
                        {{--                                <td class="text-center" colspan="5">Tidak Ada Data</td>--}}
                        {{--                            </tr>--}}
                        {{--                        @endforelse--}}
                        </tbody>
                    </table>
                </div>
                <!-- end::table -->
            </div>
        </div>
    </x-card.standart>
</div>
