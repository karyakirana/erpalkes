<x-livewire-tables::bs5table.cell>
    {{$row->kode}}
</x-livewire-tables::bs5table.cell>
<x-livewire-tables::bs5table.cell>
    {{$row->tgl_nota}}
</x-livewire-tables::bs5table.cell>
<x-livewire-tables::bs5table.cell>
    {{$row->supplier->nama}}
</x-livewire-tables::bs5table.cell>
<x-livewire-tables::bs5table.cell>
    {{$row->status}}
</x-livewire-tables::bs5table.cell>
<x-livewire-tables::bs5table.cell>
    <x-button.btn-link-table>SET</x-button.btn-link-table>
</x-livewire-tables::bs5table.cell>
