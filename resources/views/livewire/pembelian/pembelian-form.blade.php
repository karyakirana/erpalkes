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
    <x-card.standart class="mt-5" title="Form Pembelian">
        <x-slot:toolbar>
            {{$kode}}
        </x-slot:toolbar>
        <div class="row">
            <div class="col-6">
                <x-input.group-horizontal label="Tgl. Pembelian" name="tgl_nota">
                    <x-input.single-daterange wire:model.defer="tgl_nota" id="tgl_nota" />
                </x-input.group-horizontal>
            </div>
            <div class="col-6">
                <x-input.group-horizontal label="Tgl. Tempo" name="tgl_tempo">
                    <x-input.single-daterange wire:model.defer="tgl_tempo" id="tgl_tempo" />
                </x-input.group-horizontal>
            </div>
        </div>
        <div class="row">
            <div class="col-6">
                <x-input.group-horizontal label="Supplier" name="supplier_nama">
                    <x-input.text wire:model.defer="supplier_nama" data-bs-toggle="modal" data-bs-target="#modalSupplierSet" readonly />
                </x-input.group-horizontal>
            </div>
            <div class="col-6">
                <x-input.group-horizontal label="ID Preorder" name="pembelian_po_id">
                    <x-input.text wire:model.defer="pembelian_po_id" data-bs-toggle="modal" data-bs-target="#modalPembelianPreorderSet" readonly/>
                </x-input.group-horizontal>
            </div>

        </div>
        <div class="row" >
            <div class="col-6" >
                <x-input.group-horizontal label="Keterangan" name="customer_nama">
                    <x-input.text wire:model.defer="keterangan" />
                </x-input.group-horizontal>
            </div>
        </div>
    </x-card.standart>
    <x-card.standart class="mt-5" title="Form">
        <div class="row">
            <!-- begin:: form-produk -->
            <div class="col-4">
                <x-input.group-vertical label="Produk" name="produk_nama">
                    <x-input.textarea wire:model.defer="produk_nama" data-bs-toggle="modal" data-bs-target="#modalProdukSet" readonly />
                </x-input.group-vertical>
                <div class="row">
                    <div class="col-8">
                        <x-input.group-vertical label="Kemasan" name="kemasan_id">
                            <x-input.select wire:model="kemasan_id">
                                <option>Dipilih</option>
                                @forelse($dataKemasan as $index => $row)
                                    <option value="{{$index}}">{{$row->kemasan}}</option>
                                @empty
                                @endforelse
                            </x-input.select>
                        </x-input.group-vertical>
                    </div>
                    <div class="col-4">
                        <x-input.group-vertical label="Isi" name="kemasan_isi">
                            <x-input.text value="{{$kemasan_isi}}"/>
                        </x-input.group-vertical>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <x-input.group-vertical label="Jumlah Kemasan" name="jumlah">
                            <x-input.text wire:model="kemasan_jumlah" />
                        </x-input.group-vertical>
                    </div>
                    <div class="col-8">
                        <x-input.group-vertical label="Harga Kemasan" name="harga">
                            <div class="input-group">
                                <span class="input-group-text">Rp.</span>
                                <x-input.text wire:model="kemasan_harga" />
                            </div>
                        </x-input.group-vertical>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <x-input.group-vertical label="Jumlah" name="jumlah">
                            <x-input.text value="{{$jumlah}}" readonly/>
                        </x-input.group-vertical>
                    </div>
                    <div class="col-8">
                        <x-input.group-vertical label="Rp." name="harga">
                            <div class="input-group">
                                <span class="input-group-text">Rp.</span>
                                <x-input.text value="{{rupiah_format($harga)}}" readonly/>
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
                                <x-input.text value="{{rupiah_format($harga_setelah_diskon)}}" readonly />
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
            <!-- end:: form-pembelian -->
            <div class="col-8">
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
                                <input type="number" class="form-control text-end" wire:model.defer="ppn">
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
            <!-- end:: form-pembelian -->
        </div>
        <x-slot:footer>
            <div class="text-end">
                @if($mode == 'create')
                    <x-button.btn-base>Simpan</x-button.btn-base>
                @else
                    <x-button.btn-base>Update</x-button.btn-base>
                @endif
            </div>
        </x-slot:footer>
    </x-card.standart>
    <x-datatables.produk-set />
    <x-datatables.supplier-set />
    <x-datatables.pembelian-preorder-set />
</div>

