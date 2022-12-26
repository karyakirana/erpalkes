<?php

namespace App\Http\Livewire\Datatables;

use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CategoryIndexTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('ID','kode'),
            Column::make('Nama','nama'),
            Column::make('Keterangan','keterangan'),
        ];
    }

    public function query(): Builder
    {

    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.category_index_table';
    }
}
