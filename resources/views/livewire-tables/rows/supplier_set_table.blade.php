<x-livewire-tables::table.cell width="10%">
    {{$row->kode}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell width="15%">
    {{$row->status}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell width="20%">
    {{ucwords($row->nama)}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell width="20%">
    {{$row->alamat}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell width="20%">
    {{$row->regency->name}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell width="15%" class="text-center">
    <x-button.btn-table wire:click="$emit('setSupplier', {{$row->id}})">SET</x-button.btn-table>
</x-livewire-tables::table.cell>
