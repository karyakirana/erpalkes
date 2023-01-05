<x-livewire-tables::bs5.table.cell>
    {{$loop->iteration}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{$row->pegawai->nama}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{$row->username}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    {{$row->email}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell>
    <x-button.btn-icon-link-edit href="{{route('users.form.edit', $row->id)}}"/>
    <x-button.btn-icon-delete />
</x-livewire-tables::bs5.table.cell>
