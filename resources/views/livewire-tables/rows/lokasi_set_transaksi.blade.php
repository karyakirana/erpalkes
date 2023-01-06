<x-livewire-tables::table.cell>
    {{$row->kode}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    {{$row->lokasi}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    {{$row->keterangan}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell>
    <x-button.btn-table wire:click="$emit('setLokasi', {{$row->id}})">set</x-button.btn-table>
</x-livewire-tables::table.cell>
