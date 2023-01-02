<?php

namespace App\Http\Livewire\Datatables;

use App\Models\Master\PegawaiSalesArea;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SalesListSetTable extends DataTableComponent
{
    use LivewireDatatableTrait;

    public function columns(): array
    {
        return [
            Column::make(''),
            Column::make('Pegawai', 'pegawai.nama'),
            Column::make('Telepon', 'pegawai.telepon'),
            Column::make('')
        ];
    }

    public function query(): Builder
    {
        return PegawaiSalesArea::query();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.sales_list_set_table';
    }
}
