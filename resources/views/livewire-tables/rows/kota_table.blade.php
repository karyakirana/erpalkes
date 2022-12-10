<x-livewire-tables::bs5.table.cell width="20%">
    {{$row->province->name}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell width="60%">
    {{$row->name}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell width="20%" class="text-center">
    <x-button.btn-table wire:click="$emit('setCity', {{$row->id}})">SET</x-button.btn-table>
</x-livewire-tables::bs5.table.cell>
