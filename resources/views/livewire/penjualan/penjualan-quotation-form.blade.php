<div class="row g-5 mt-5">
    <div class="col-lg-8">
        <x-card.card-1 title="Form Quotation" class="mt-5">
            <x-slot:toolbar>
                <h4>{{$kode}}</h4>
            </x-slot:toolbar>
            <div class="row ">
                <div class="col-4">
                    <x-input.group-vertical label="Customer" name="customer_id">
                        <x-input.text wire:model.defer="customer_id" />
                    </x-input.group-vertical>
                </div>
                <div class="col-4">
                    <x-input.group-vertical label="Tanggal" name="tgl_quotation">
                        <x-input.text wire:model.defer="tgl_quotation" />
                    </x-input.group-vertical>
                </div>
                <div class="col-4">
                    <x-input.group-vertical label="Sales" name="sales_id">
                        <x-input.text wire:model.defer="sales_id" />
                    </x-input.group-vertical>
                </div>
            </div>
            <div class="row">
                <div class="col-4">
                    <x-input.group-vertical label="Alamat" name="alamat">
                        <x-input.text wire:model.defer="alamat"/>
                    </x-input.group-vertical>
                </div>
                <div class="col-8">
                    <x-input.group-vertical label="Keterangan" name="keterangan">
                        <x-input.text wire:model.defer="keterangan"/>
                    </x-input.group-vertical>
                </div>
            </div>
        </x-card.card-1>


        <x-card.card-2 title="Detail Item">
            <x-forms.quotation-table-form/>
            <x-slot:footer></x-slot:footer>
        </x-card.card-2>
    </div>


    <div class="col-lg-4">
        <x-card.card-3 title="Tambah Produk" class="mt-5" data-kt-sticky="true" data-kt-sticky-name="quotation" data-kt-sticky-offset="{default: false, lg: '100px'}" data-kt-sticky-width="{lg: '300px', lg: '410px'}" data-kt-sticky-left="auto" data-kt-sticky-top="150px"  data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
            <div class="row">
                <x-input.group-vertical label="Produk" name="produk_id">
                    <x-input.text wire:model.defer="produk_id" />
                </x-input.group-vertical>
                <div class="col-5">
                    <x-input.group-vertical label="Jumlah" name="jumlah">
                        <x-input.text wire:model.defer="jumlah" />
                    </x-input.group-vertical>
                </div>
                <div class="col-7">
                    <x-input.group-vertical label="Harga" name="harga">
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <x-input.text wire:model.defer="harga" />
                        </div>
                    </x-input.group-vertical>
                </div>
                <div class="col-5">
                    <x-input.group-vertical label="Diskon" name="diskon">
                        <div class="input-group">
                            <x-input.text wire:model.defer="diskon" />
                            <span class="input-group-text">%</span>
                        </div>
                    </x-input.group-vertical>
                </div>
                <div class="col-7">
                    <x-input.group-vertical label="Harga Diskon" name="harga">
                        <div class="input-group">
                            <span class="input-group-text">Rp.</span>
                            <x-input.text wire:model.defer="harga" />
                        </div>
                    </x-input.group-vertical>
                </div>
                <x-input.group-vertical label="Sub Total" name="sub_total">
                    <div class="input-group">
                        <span class="input-group-text">Rp.</span>
                        <x-input.text wire:model.defer="sub_total" />
                    </div>
                </x-input.group-vertical>
                <div class="text-center pb-4 pt-5">
                    <x-button.btn-modal color="info" target="#">Add Produk</x-button.btn-modal>
                    @if($update)
                        <x-button.btn-base wire:click="update">Update</x-button.btn-base>
                    @else
                        <x-button.btn-base wire:click="store">Save All</x-button.btn-base>
                    @endif
                </div>
            </div>
{{--            <x-slot:footer>--}}

{{--            </x-slot:footer>--}}
        </x-card.card-3>
    </div>

</div>

