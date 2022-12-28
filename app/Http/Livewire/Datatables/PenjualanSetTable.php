<?php

namespace App\Http\Livewire\Datatables;

use App\Mine\SubPenjualan\PenjualanRepository;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PenjualanSetTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('ID', 'kode'),
            Column::make('Tanggal', 'tgl_nota'),
            Column::make('Tempo', 'tgl_tempo'),
            Column::make('Sales', 'sales.nama'),
            Column::make('Tagihan', 'total_bayar'),
            Column::make('Status'),
            Column::make(''),
        ];
    }

    public function query(): Builder
    {
        return PenjualanRepository::datatables();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.penjualan_set_table';
    }
}
