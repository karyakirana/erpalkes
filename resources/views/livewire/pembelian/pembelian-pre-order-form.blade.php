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
                        <x-input.group-vertical class="mb-4" label="Diskon %">
                            <x-input.text wire:model.defer=""/>
                        </x-input.group-vertical>
                    </div>
                    <div class="col-6">
                        <x-input.group-vertical class="mb-4" label="Diskon Rp.">
                            <x-input.text wire:model.defer=""/>
                        </x-input.group-vertical>
                    </div>
                </div>
                <x-input.group-vertical label="Sub Total">
                    <x-input.text wire:model.defer="" readonly/>
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
                        <div class="col-md-6">
                            <x-input.group-vertical label="Tanggal">
                            </x-input.group-vertical>
                        </div>
                    </div>
                </div>
                <!-- end::input row -->
                <!-- begin::input row -->
                <div class="row mb-4">
                    <div class="col-md-6">
                        <x-input.group-vertical label="Keterangan">
                            <x-input.text wire:model.defer=""/>
                        </x-input.group-vertical>
                    </div>
                </div>
                <!-- end::input row -->
                <!-- begin::table -->
                <x-forms.data-detail-nondiscount-table :data-detail="$dataDetail" btn-delete="removeLine" btn-edit="editLine"/>
                <!-- end::table -->
            </div>
        </div>
    </x-card.standart>
</div>
