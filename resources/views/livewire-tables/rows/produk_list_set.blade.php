<x-livewire-tables::bs5.table.cell>
    {{$row->kode}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{$row->nama_produk}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{$row->merk}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{$row->tipe}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    <x-button.btn-table wire:click="$emit('setProduk', {{$row->id}})">set</x-button.btn-table>
</x-livewire-tables::bs5.table.cell>
