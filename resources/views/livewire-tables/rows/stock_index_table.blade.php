<x-livewire-tables::bs5.table.cell width="10%">
    {{$row->produk->kode}}
</x-livewire-tables::bs5.table.cell>
<x-livewire-tables::bs5.table.cell width="35%">
    {{$row->produk->nama_produk}} <br>
    {{$row->tgl_expired}}
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
