<div>
    <x-card.standart class="mt-5">
        <div class="row">
            <div class="col-md-10">
                <x-input.group-horizontal label="Customer" name="customer_nama">
                    <x-input.text wire:model.defer="customer_nama" data-bs-toggle="modal" data-bs-target="#modalCustomerSet" readonly />
                </x-input.group-horizontal>
                <x-input.group-horizontal label="Penerima CN" name="penerima_cn">
                    <x-input.text wire:model.defer="penerima_cn" />
                </x-input.group-horizontal>
                <x-input.group-horizontal label="Jabatan CN" name="jabatan_cn">
                    <x-input.text wire:model.defer="jabatan_cn" />
                </x-input.group-horizontal>
                <x-input.group-horizontal label="Unit CN" name="unit_cn">
                    <x-input.text wire:model.defer="unit_cn" />
                </x-input.group-horizontal>
                <x-input.group-horizontal label="Keterangan" name="keterangan">
                    <x-input.text wire:model.defer="keterangan" />
                </x-input.group-horizontal>
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
    <x-datatables.customer-set />
</div>
