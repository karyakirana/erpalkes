<div>
    <x-card.standart title="Form Penerima CN" class="mt-5">
        <x-input.group-horizontal label="Customer" name="customer_nama">
            <x-input.text wire:model.defer="customer_nama" data-bs-toggle="modal" data-bs-target="#modalCustomerSet" readonly/>
        </x-input.group-horizontal>
        <x-input.group-horizontal label="Penerima" name="penerima_cn">
            <x-input.text wire:model.defer="penerima_cn" />
        </x-input.group-horizontal>
        <x-input.group-horizontal label="Jabatan" name="jabatan_cn">
            <x-input.text wire:model.defer="jabatan_cn" />
        </x-input.group-horizontal>
        <x-input.group-horizontal label="Unit" name="unit_cn">
            <x-input.text wire:model.defer="unit_cn"/>
        </x-input.group-horizontal>
        <x-input.group-horizontal label="Keterangan" name="keterangan">
            <x-input.text wire:model.defer="keterangan" />
        </x-input.group-horizontal>
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
