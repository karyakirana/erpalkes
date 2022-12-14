<x-livewire-tables::table.cell width="10%">
    {{$row->kode}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell width="15%">
    {{$row->jenis_instansi}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell width="20%">
    {{ucwords($row->nama_customer)}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell width="25%">
    {{$row->alamat}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell width="15%">
    {{$row->regency->name}}
</x-livewire-tables::table.cell>
<x-livewire-tables::table.cell width="15%" class="text-center">
    <x-button.btn-table wire:click="$emit('setCustomer', {{$row->id}})">Set</x-button.btn-table>
</x-livewire-tables::table.cell>
