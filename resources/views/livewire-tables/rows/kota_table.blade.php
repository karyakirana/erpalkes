<x-livewire-tables::bs4.table.cell width="20%">
    {{$row->province->name}}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell width="60%">
    {{$row->name}}
</x-livewire-tables::bs4.table.cell>
<x-livewire-tables::bs4.table.cell width="20%">
    <x-button.btn-table wire:click="$emit('setCity', {{$row->id}})">SET</x-button.btn-table>
</x-livewire-tables::bs4.table.cell>
