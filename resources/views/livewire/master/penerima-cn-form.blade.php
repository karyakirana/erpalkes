<div>
    <x-card.standart title="Form Penerima CN" class="mt-5">
        <x-slot:toolbar>
            <h4>{{$kode}}</h4>
        </x-slot:toolbar>
        <div class="row">
            <div class="col-4">
                <x-input.group-vertical label="Customer" name="customer_nama">
                    <x-input.text wire:model.defer="customer_nama" data-bs-toggle="modal" data-bs-target="#modalCustomerSet" readonly/>
                </x-input.group-vertical>
            </div>
            <div class="col-3">
                <x-input.group-vertical label="Penerima" name="penerima_cn">
                    <x-input.text wire:model.defer="penerima_cn" />
                </x-input.group-vertical>
            </div>
            <div class="col-3">
                <x-input.group-vertical label="Jabatan" name="jabatan_cn">
                    <x-input.text wire:model.defer="jabatan_cn" />
                </x-input.group-vertical>
            </div>
            <div class="col-2">
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <x-input.group-vertical label="Unit" name="unit_cn">
                    <x-input.text wire:model.defer="unit_cn"/>
                </x-input.group-vertical>
            </div>
            <div class="col-6">
                <x-input.group-vertical label="Keterangan" name="keterangan">
                    <x-input.text wire:model.defer="keterangan" />
                </x-input.group-vertical>
            </div>
            <div class="col-2">
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

    <x-datatables.customer-set />
</div>
