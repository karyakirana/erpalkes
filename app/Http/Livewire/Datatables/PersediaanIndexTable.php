<?php

namespace App\Http\Livewire\Datatables;

use App\Models\Persediaan\Persediaan;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PersediaanIndexTable extends DataTableComponent
{
    use LivewireDatatableTrait;

    public function columns(): array
    {
        return [
            Column::make('Produk', 'produk.nama'),
            Column::make('Harga', 'harga'),
            Column::make('Stock Awal', 'stock_awal'),
            Column::make('Stock Masuk', 'stock_masuk'),
            Column::make('Stock Keluar', 'stock_keluar'),
            Column::make('Stock Saldo', 'stock_saldo'),
        ];
    }

    public function query(): Builder
    {
        return Persediaan::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.persediaan_index_table';
    }
}
