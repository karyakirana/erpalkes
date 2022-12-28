<?php

namespace App\Http\Livewire\Datatables;

use App\Mine\SubPenjualan\PenjualanPreorderRepository;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PenjualanPreorderSetTable extends DataTableComponent
{
    use LivewireDatatableTrait;

    public function columns(): array
    {
        return [
            Column::make('ID', 'kode'),
            Column::make('Tanggal', 'tgl_preorder'),
            Column::make('Sales', 'sales.nama'),
            Column::make('Tagihan', 'total_bayar'),
            Column::make('Status'),
            Column::make(''),
        ];
    }

    public function query(): Builder
    {
        return PenjualanPreorderRepository::datatables();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.penjualan_preorder_set_table';
    }
}
