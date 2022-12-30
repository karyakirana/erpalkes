<x-livewire-tables::bs5.table.cell width="30%">
    {{$row->produk->nama_produk}} <br>
    {{$row->tgl_expired}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell width="15%">
    {{$row->harga}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell width="15%">
    {{$row->stock_awal}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell width="15%">
    {{$row->stock_masuk}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell width="15%">
    {{$row->stock_keluar}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell width="15%">
    {{$row->stock_saldo}}
</x-livewire-tables::bs5.table.cell>
