<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Datatables\LivewireDatatableTrait;
use App\Mine\SubMaster\SalesSupervisorRepository;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SalesSupervisorIndexTable extends DataTableComponent
{
    use LivewireDatatableTrait;
    public function columns(): array
    {
        return [
            Column::make('ID', 'kode'),
            Column::make('Supervisor', 'pegawai.nama_pegawai')
                ->searchable(),
            Column::make('Area', 'area.nama_area')
                ->searchable(),
            Column::make('')
        ];
    }

    public function query(): Builder
    {
        return SalesSupervisorRepository::datatables();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.sales_supervisor_index_table';
    }
}
