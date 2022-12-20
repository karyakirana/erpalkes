<x-livewire-tables::bs5.table.cell width="15%">
    {{$row->kode}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{$row->customer->nama_customer}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{$row->penerima_cn}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell width="20%">
    {{$row->jabatan_cn}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell class="text-end" width="15%">
    <x-button.btn-icon-link-edit href="{{route('customercn.form.edit', $row->id)}}" />
    <x-button.btn-icon-delete wire:click="destroy({{$row->id}})" />
</x-livewire-tables::bs5.table.cell>
