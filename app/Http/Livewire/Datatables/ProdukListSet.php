<?php

namespace App\Http\Livewire\Datatables;

use App\Models\Master\Produk;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ProdukListSet extends DataTableComponent
{
    use LivewireDatatableTrait;

    protected string $pageName = 'produk';

    public function columns(): array
    {
        return [
            Column::make('ID', 'kode'),
            Column::make('Produk', 'nama_produk'),
            Column::make('Merk'),
            Column::make('Tipe'),
            Column::make(''),
        ];
    }

    public function query(): Builder
    {
        return Produk::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.produk_list_set';
    }
}
