<?php

namespace App\Http\Livewire\Datatables;

use App\Mine\SubPersediaan\PersediaanAwalRepository;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PersediaanAwalIndexTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Column Name'),
        ];
    }

    public function query(): Builder
    {
        return PersediaanAwalRepository::datatables();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.persediaan_awal_index_table';
    }
}
