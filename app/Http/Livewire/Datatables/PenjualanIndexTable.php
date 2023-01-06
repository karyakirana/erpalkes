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
            Column::make('ID', 'kode')
                ->addClass('text-center'),
            Column::make('Customer', 'customer.nama')
                ->addClass('text-center'),
            Column::make('Tanggal', 'tgl_penjualan')
                ->addClass('text-center'),
            Column::make('Jumlah', 'total_barang')
                ->addClass('text-center'),
            Column::make('Total Bayar', 'total_bayar')
                ->addClass('text-center'),
            Column::make('Status', 'status')
                ->addClass('text-center'),
            Column::make('')
                ->addClass('text-center'),
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
