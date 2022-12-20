<x-livewire-tables::bs5.table.cell width="15%">
    {{$row->kode}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{$row->nama}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{$row->pegawai->nama}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell width="15%" class="text-end">
    <x-button.btn-icon-link-edit href="{{route('area.form.edit', $row->id)}}" />
    <x-button.btn-icon-delete wire:click="$emit('destroy', {{$row->id}})" />
</x-livewire-tables::bs5.table.cell>
