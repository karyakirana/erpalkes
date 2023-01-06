<?php

namespace App\Http\Livewire\Datatables;

use App\Models\Stock\Stock;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class StockIndexTable extends DataTableComponent
{
    use LivewireDatatableTrait;
    public function columns(): array
    {
        return [
            Column::make('ID', 'produk.kode'),
            Column::make('Produk', 'produk.name'),
            Column::make('Stock Awal', 'stock_awal'),
            Column::make('Stock Masuk', 'stock_masuk'),
            Column::make('Stock Akhir', 'stock_akhir'),
            Column::make('Stock saldo', 'stock_saldo'),
        ];
    }

    public function query(): Builder
    {
        return Stock::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.stock_index_table';
    }
}
