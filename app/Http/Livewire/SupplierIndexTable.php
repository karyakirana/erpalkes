<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Datatables\LivewireDatatableTrait;
use App\Mine\SubMaster\SupplierRepository;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SupplierIndexTable extends DataTableComponent
{
    use LivewireDatatableTrait;

    public function columns(): array
    {
        return [
            Column::make('ID', 'kode')
                ->sortable(),
            Column::make('Nama', 'nama_supplier')
                ->searchable()
                ->sortable(),
            Column::make('Telepon')
                ->searchable()
                ->sortable(),
            Column::make('Alamat'),
            Column::make('Kota / Kab', 'regency.name')
                ->searchable()
                ->sortable(),
            Column::make('')
        ];
    }

    public function query(): Builder
    {
        return SupplierRepository::datatables();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.supplier_index_table';
    }
}
