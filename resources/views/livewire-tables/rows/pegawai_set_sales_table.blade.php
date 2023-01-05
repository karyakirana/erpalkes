<x-livewire-tables::bs5.table.cell>
    {{$row->kode}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{$row->nama}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{$row->alamat}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{$row->telepon}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    <x-button.btn-table wire:click="$emit('setPegawai', {{$row->id}})">Set</x-button.btn-table>
</x-livewire-tables::bs5.table.cell>
