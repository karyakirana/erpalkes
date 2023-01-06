<?php

namespace App\Http\Livewire\Datatables;

use App\Models\Pembelian\Pembelian;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PembelianIndexTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('ID', 'kode'),
            Column::make('Supplier', 'supplier.nama'),
            Column::make('Tanggal', 'tgl_nota'),
            Column::make('Jumlah', 'total_barang'),
            Column::make('Total Bayar', 'total_bayar'),
            Column::make('Status', 'status'),
            Column::make('')
        ];
    }

    public function query(): Builder
    {
        return Pembelian::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.pembelian_index_table';
    }
}
