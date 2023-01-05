<x-livewire-tables::bs5.table.cell>
    {{$row->kode}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{$row->lokasi}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{$row->keterangan}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    <x-button.btn-icon-edit wire:click="$emit('edit', {{$row->id}})" />
    <x-button.btn-icon-delete wire:click="$emit('destroy', {{$row->id}})" />
</x-livewire-tables::bs5.table.cell>
