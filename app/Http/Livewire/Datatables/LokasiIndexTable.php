<?php

namespace App\Http\Livewire\Datatables;

use App\Models\Master\Gudang;
use App\Models\Master\Lokasi;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class LokasiIndexTable extends DataTableComponent
{
    use LivewireDatatableTrait;

    public function columns(): array
    {
        return [
            Column::make('ID', 'kode'),
            Column::make('Lokasi'),
            Column::make('Keterangan'),
            Column::make(''),
        ];
    }

    public function query(): Builder
    {
        return Lokasi::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.lokasi_index_table';
    }
}
