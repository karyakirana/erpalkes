<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Datatables\LivewireDatatableTrait;
use App\Mine\SubMaster\SalesSupervisorRepository;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SalesSupervisorDetailIndexTable extends DataTableComponent
{
    use LivewireDatatableTrait;
    public function columns(): array
    {
        return [
            Column::make('Supervisor', 'salesSupervisor.pegawai.nama_pegawai'),
            Column::make('Sales', 'pegawai.nama_pegawai'),
            Column::make('Kota', 'regency.name'),
            Column::make('')
        ];
    }

    public function query(): Builder
    {
        return SalesSupervisorRepository::datatablesDetail();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.sales_supervisor_detail_index_table';
    }
}
