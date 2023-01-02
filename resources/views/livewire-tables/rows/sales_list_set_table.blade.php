<x-livewire-tables::bs5.table.cell>
    {{$loop->iteration}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{$row->pegawai->nama}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{$row->pegawai->telepon}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    <x-button.btn-table wire:click="$emit('setSales', {{$row->id}})">set</x-button.btn-table>
</x-livewire-tables::bs5.table.cell>
