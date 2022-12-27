<?php

namespace App\Http\Livewire\Datatables;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PembelianIndexTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('ID', 'kode'),
            Column::make('Preorder', 'pembelian.pembelianPreorder'),
            Column::make('Supplier', 'supplier.nama'),
            Column::make('Status'),
            Column::make('Pembuat'),
            Column::make('')
        ];
    }

    public function query(): Builder
    {
        //
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.pembelian_index_table';
    }
}
