<x-livewire-tables::bs5.table.cell class="text-center" width="15%">
    {{$row->kode}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell class="text-center" width="15%">
    {{(ucwords($row->kondisi))}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell class="text-center" width="15%">
    {{ucwords($row->gudang->lokasi)}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell class="text-center" width="15%">
    {{ucwords($row->users->name)}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell class="text-center" width="10%">
    {{$row->total_barang}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell class="text-end">
    {{rupiah_format($row->total_nominal)}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell width="15%" class="text-end">
    <x-atoms.btn-dropdown-table>
        <x-atoms.btn-dropdown-menu-table wire:click="$emit('loadDetail', {{$row->id}})">
            View
        </x-atoms.btn-dropdown-menu-table>
        <x-atoms.btn-dropdown-menu-table :href="route('persediaan.awal.form.edit', $row->id)">
            Edit
        </x-atoms.btn-dropdown-menu-table>
    </x-atoms.btn-dropdown-table>
</x-livewire-tables::bs5.table.cell>
