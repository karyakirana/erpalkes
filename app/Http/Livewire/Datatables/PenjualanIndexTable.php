<?php

namespace App\Http\Livewire\Datatables;

use App\Models\Penjualan\Penjualan;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PenjualanIndexTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('ID', 'kode'),
            Column::make('Customer', 'customer.nama'),
            Column::make('Tanggal', 'tgl_penjualan'),
            Column::make('Jumlah', 'total_barang'),
            Column::make('Total Bayar', 'total_bayar'),
            Column::make('Status', 'status'),
            Column::make('')
        ];
    }

    public function query(): Builder
    {
        return Penjualan::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.penjualan_index_table';
    }
}
