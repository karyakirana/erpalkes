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
    <x-card.standart class="mt-5" title="Form Penjualan">
        <x-slot:toolbar>
            {{$kode}}
        </x-slot:toolbar>
        <div class="row">
            <!-- begin:: form-produk -->
            <div class="col-4">
                <x-input.group-vertical label="Produk" name="produk_nama">
                    <x-input.textarea wire:model.defer="produk_nama" data-bs-toggle="modal" data-bs-target="#modalProdukSet" readonly />
                </x-input.group-vertical>
                <x-input.group-vertical label="Kemasan" name="kemasan">
                    <x-input.select wire:model.defer="kemasan">
                        <option>Dipilih</option>
                        @forelse($dataKemasan as $row)
                            <option value="{{$row->kemasan}}">{{$row->kemasan}}</option>
                        @empty
                        @endforelse
                    </x-input.select>
                </x-input.group-vertical>
                <div class="row">
                    <div class="col-4">
                        <x-input.group-vertical label="Jumlah" name="jumlah">
                            <x-input.text wire:model="jumlah" />
                        </x-input.group-vertical>
                    </div>
                    <div class="col-8">
                        <x-input.group-vertical label="Rp." name="harga">
                            <div class="input-group">
                                <span class="input-group-text">Rp.</span>
                                <x-input.text wire:model="harga" />
                            </div>
                        </x-input.group-vertical>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <x-input.group-vertical label="Diskon" name="diskon">
                            <div class="input-group">
                                <x-input.text wire:model="diskon" />
                                <span class="input-group-text">%</span>
                            </div>
                        </x-input.group-vertical>
                    </div>
                    <div class="col-8">
                        <x-input.group-vertical label="Diskon Rp." name="harga">
                            <div class="input-group">
                                <span class="input-group-text">Rp.</span>
                                <x-input.text wire:model="harga_setelah_diskon" />
                            </div>
                        </x-input.group-vertical>
                    </div>
                </div>
                <x-input.group-vertical label="Sub Total" name="sub_total">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <x-input.text value="{{rupiah_format($sub_total)}}" />
                    </div>
                </x-input.group-vertical>
                @if($update)
                    <x-button.btn-base color="secondary" wire:click="updateLine">update produk</x-button.btn-base>
                @else
                    <x-button.btn-base color="secondary" wire:click="addLine">add produk</x-button.btn-base>
                @endif
            </div>
            <!-- begin:: form-produk -->
            <!-- end:: form-penjualan -->
            <div class="col-8">
                <div class="row">
                    <div class="col-6">
                        <x-input.group-horizontal label="Tanggal Invoice" name="tgl_penjualan">
                            <x-input.single-daterange wire:model.defer="tgl_penjualan" id="tgl_penjualan" />
                        </x-input.group-horizontal>
                    </div>
                    <div class="col-6">
                        <x-input.group-horizontal label="Tanggal Tempo" name="tgl_tempo">
                            <x-input.single-daterange wire:model.defer="tgl_tempo" id="tgl_tempo" />
                        </x-input.group-horizontal>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <x-input.group-horizontal label="Customer" name="customer_nama">
                            <x-input.text wire:model.defer="customer_nama" data-bs-toggle="modal" data-bs-target="#modalCustomerSet" readonly />
                        </x-input.group-horizontal>
                    </div>
                    <div class="col-6">
                        <x-input.group-horizontal label="Sales" name="sales_nama">
                            <x-input.text wire:model.defer="sales_nama" data-bs-toggle="modal" data-bs-target="#modalSalesList" readonly/>
                        </x-input.group-horizontal>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <x-input.group-horizontal label="Keterangan" name="customer_nama">
                            <x-input.text wire:model.defer="keterangan" />
                        </x-input.group-horizontal>
                    </div>
                    <div class="col-6">
                        <x-input.group-horizontal label="ID Preorder" name="penjualan_preorder_id">
                            <x-input.text wire:model.defer="penjualan_preorder_id" data-bs-toggle="modal" data-bs-target="#modalPenjualanPreorderSet" readonly/>
                        </x-input.group-horizontal>
                    </div>
                </div>
                <!-- begin::tableproduk -->
                <x-atoms.table class="border">
                    <x-slot:head>
                        <tr>
                            <th style="width: 40%">Item</th>
                            <th style="width: 15%" colspan="2">Jumlah</th>
                            <th style="width: 15%">Diskon</th>
                            <th style="width: 15%">Sub Total</th>
                            <th style="width: 15%"></th>
                        </tr>
                    </x-slot:head>
                    @forelse($dataDetail as $index => $row)
                        <tr>
                            <x-table.td align="start">
                                {{$row['produk_nama']}}
                                @if($row['kemasan'])
                                    <br> Kemasan : {{$row['kemasan']}}
                                @endif
                                <br> Harga : {{rupiah_format($row['harga'])}}
                            </x-table.td>
                            <x-table.td align="end">
                                {{$row['jumlah']}}
                            </x-table.td>
                            <x-table.td align="start">
                                {{$row['satuan_jual']}}
                            </x-table.td>
                            <x-table.td>
                                {{$row['diskon']}}
                            </x-table.td>
                            <x-table.td align="end">
                                {{rupiah_format($row['sub_total'])}}
                            </x-table.td>
                            <x-table.td>
                                <x-button.btn-icon-edit wire:click="editLine({{$index}})"/>
                                <x-button.btn-icon-delete wire:click="destroyLine({{$index}})"/>
                            </x-table.td>
                        </tr>
                    @empty
                        <tr>
                            <td class="text-center" colspan="5">Tidak Ada Data</td>
                        </tr>
                    @endforelse
                    <x-slot:footer>
                        <tr>
                            <td colspan="3" class="text-end">Total : </td>
                            <td class="text-end" colspan="2">
                                {{rupiah_format($total_sub_total)}}
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-end">PPN :</td>
                            <td colspan="2">
                                <input type="number" class="form-control text-end" wire:model.defer="total_ppn">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-end">Biaya Lain :</td>
                            <td colspan="2">
                                <input type="number" class="form-control text-end" wire:model.defer="total_biaya_lain">
                            </td>
                        </tr>
                        <tr>
                            <td colspan="3" class="text-end">Total Bayar :</td>
                            <td class="text-end" colspan="2">
                                {{rupiah_format($total_sub_total)}}
                            </td>
                        </tr>
                    </x-slot:footer>
                </x-atoms.table>
                <!-- end::tableproduk -->
            </div>
            <!-- end:: form-penjualan -->
        </div>
        <x-slot:footer>
            <div class="text-end">
                @if($mode == 'create')
                    <x-button.btn-base wire:click="store">Simpan</x-button.btn-base>
                @else
                    <x-button.btn-base wire:click="update">Update</x-button.btn-base>
                @endif
            </div>
        </x-slot:footer>
    </x-card.standart>
    <x-datatables.produk-set />
    <x-datatables.customer-set />
    <x-datatables.sales-list-set />
    <x-datatables.penjualan-preorder-set />
</div>

