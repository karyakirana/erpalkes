<?php

namespace App\Http\Livewire\Datatables;

use App\Mine\SubMaster\PegawaiSalesAreaRepository;
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
//            Column::make(''),
//            Column::make('Pegawai', 'pegawai.nama'),
//            Column::make('Telepon', 'pegawai.telepon'),
//            Column::make('')
            Column::make('ID', 'kode')
                ->sortable(),
            Column::make('Nama', 'nama')
                ->sortable()
                ->searchable(),
            Column::make('Telepon', 'telepon'),
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
