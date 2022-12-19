<?php

namespace App\Http\Livewire\Master;

use App\Http\Livewire\Datatables\LivewireDatatableTrait;
use App\Models\Master\Jabatan;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class JabatanIndexTable extends DataTableComponent
{
    use LivewireDatatableTrait;
    public function columns(): array
    {
        return [
            Column::make('ID', 'kode'),
            Column::make('Jabatan', 'nama'),
            Column::make('Keterangan' ),
            Column::make('' ),
        ];
    }

    public function query(): Builder
    {
        return Jabatan::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.jabatan_index_table';
    }
}
