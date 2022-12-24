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
    <div class="mt-5 form d-flex flex-column flex-lg-row fv-plugins-bootstrap5 fv-plugins-framework">
        <!-- begin::aside Column -->
        <div class="d-flex flex-column gap-7 gap-lg-10 w-100 w-lg-300px me-lg-10">
            <livewire:master.kategori-sub-kategori-form :produk_sub_kategori_id="$produk_sub_kategori_id" />
        </div>
        <!-- end::aside Column -->
        <!-- begin::main Column -->
        <div class="d-flex flex-column flex-row-fluid gap-7 gap-lg-10">
            <div class="d-flex flex-column gap-7 gap-lg-10">
                <x-card.standart title="Form Produk" class="card-flush">
                    <x-input.group-vertical label="Product Name" name="nama_produk">
                        <x-input.text wire:model.defer="nama_produk" />
                    </x-input.group-vertical>
                    <x-input.group-vertical label="Merk" name="nama_produk">
                        <x-input.text wire:model.defer="merk" />
                    </x-input.group-vertical>
                    <x-input.group-vertical label="Tipe" name="tipe">
                        <x-input.textarea wire:model.defer="tipe" />
                    </x-input.group-vertical>
                    <div class="row">
                        <div class="col-6">
                            <x-input.group-vertical label="Satuan Beli" name="satuan_beli">
                                <x-input.text wire:model.defer="satuan_beli" />
                            </x-input.group-vertical>
                        </div>
                        <div class="col-6">
                            <x-input.group-vertical label="Satuan Jual" name="satuan_jual">
                                <x-input.text wire:model.defer="satuan_jual" />
                            </x-input.group-vertical>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <x-input.group-vertical label="Minimum Stock" name="minimum_stock">
                                <x-input.text wire:model.defer="minimum_stock" />
                            </x-input.group-vertical>
                        </div>
                        <div class="col-6">
                            <x-input.group-vertical label="Buffer Stock" name="buffer_stock">
                                <x-input.text wire:model.defer="buffer_stock" />
                            </x-input.group-vertical>
                        </div>
                    </div>
                </x-card.standart>
                <x-card.standart class="card-flush" title="Kemasan">
                    <div>
                        <label class="form-label">Add Kemasan</label>
                        <!-- begin::repeater -->
                        <div class="form-group">
                            <div class="d-flex flex-column gap-1">
                                @foreach($dataKemasan as $index => $row)
                                    <div class="form-group d-flex flex-wrap align-items-center gap-5">
                                        <x-input.text class="w-100 w-md-300px" placeholder="Kemasan" wire:model.defer="dataKemasan.{{$index}}.kemasan" name="dataKemasan.{{$index}}.kemasan"/>
                                        <x-input.text class="w-100 w-md-300px" placeholder="Isi" wire:model.defer="dataKemasan.{{$index}}.isi" name="dataKemasan.{{$index}}.isi"/>
                                        @if($index > 0)
                                            <x-button.btn-icon-delete wire:click="removeKemasan({{$index}})" />
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="form-group mt-5">
                            <button type="button" class="btn btn-sm btn-light-primary" wire:click="addKemasan">
                                <!--begin::Svg Icon | path: icons/duotune/arrows/arr087.svg-->
                                <span class="svg-icon svg-icon-2">
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <rect opacity="0.5" x="11" y="18" width="12" height="2" rx="1" transform="rotate(-90 11 18)" fill="currentColor" />
                                                <rect x="6" y="11" width="12" height="2" rx="1" fill="currentColor" />
                                            </svg>
                                        </span>
                                <!--end::Svg Icon-->
                                Add Kemasan
                            </button>
                        </div>
                        <!-- end::repeater -->
                    </div>
                </x-card.standart>
                <livewire:master.multiple-image-form />
                <x-card.standart class="card-flush" title="Pricing">
                    <x-input.group-vertical label="Harga" name="harga">
                        <x-input.text wire:model.defer="harga"/>
                    </x-input.group-vertical>
                    <x-input.group-vertical class="row" label="Diskon">
                        <div class="col-6">
                            <x-input.input-group-end class="w-100 w-md-300px" wire:model="dataHarga.persen_diskon" name="dataHarga.persen_diskon" add-on="%"/>
                        </div>
                        <div class="col-6">
                            <x-input.text wire:model="dataHarga.harga_diskon" name="dataHarga.harga_diskon"/>
                        </div>
                    </x-input.group-vertical>
                </x-card.standart>
            </div>
            <div class="d-flex justify-content-end">
                <!--begin::Button-->
                <a href="{{route('produk')}}" class="btn btn-light me-5">Cancel</a>
                <!--end::Button-->
                <!--begin::Button-->
                @if($update)
                    <x-button.btn-base wire:click="update">Update</x-button.btn-base>
                @else
                    <x-button.btn-base wire:click="store">Simpan</x-button.btn-base>
                @endif
                <!--end::Button-->
            </div>
        </div>
        <!-- end::main Column -->
    </div>
</div>
