<?php

namespace App\Http\Livewire\Datatables;

use App\Mine\SubMaster\PegawaiSalesAreaRepository;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SalesAreaIndexTable extends DataTableComponent
{
    use LivewireDatatableTrait;
    public function columns(): array
    {
        return [
            Column::make('ID', 'kode'),
            Column::make('Area', 'nama'),
            Column::make('Sales', 'pegawai.nama'),
            Column::make(''),
        ];
    }

    public function query(): Builder
    {
        return PegawaiSalesAreaRepository::datatables();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.sales_area_index_table';
    }
}
