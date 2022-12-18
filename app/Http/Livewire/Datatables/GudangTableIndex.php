<?php

namespace App\Http\Livewire\Datatables;

use App\Mine\SubMaster\GudangRepository;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class GudangTableIndex extends DataTableComponent
{
    use LivewireDatatableTrait;
    public function columns(): array
    {
        return [
            Column::make('ID', 'kode'),
            Column::make('Gudang', 'nama'),
            Column::make('')
        ];
    }

    public function query(): Builder
    {
        return GudangRepository::datatables();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.gudang_table_index';
    }
}
