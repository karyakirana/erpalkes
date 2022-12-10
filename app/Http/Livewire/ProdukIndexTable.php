<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Datatables\LivewireDatatableTrait;
use App\Mine\SubMaster\ProdukRepository;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class ProdukIndexTable extends DataTableComponent
{
    use LivewireDatatableTrait;
    public function columns(): array
    {
        return [
            Column::make('Id', 'kode'),
            Column::make('Produk', 'nama_produk'),
            Column::make('Kategori', 'produkKategori.kategori'),
            Column::make('Harga', 'harga'),
            Column::make('', ),
        ];
    }

    public function query(): Builder
    {
        return ProdukRepository::datatables();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.produk_index_table';
    }
}
