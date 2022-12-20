<x-livewire-tables::bs5.table.cell width="10%">
    {{$row->kode}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell width="35%">
    {{$row->nama}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell width="20%">
    {{$row->jabatan->nama}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell width="20%">
    {{$row->Telepon}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell width="15%">
    <x-button.btn-table wire:click="$emit('setPegawai', {{$row->id}})">Set</x-button.btn-table>
</x-livewire-tables::bs5.table.cell>
