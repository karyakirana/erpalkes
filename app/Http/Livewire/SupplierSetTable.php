<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Datatables\LivewireDatatableTrait;
use App\Mine\SubMaster\SupplierRepository;
use App\Models\Master\Supplier;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class SupplierSetTable extends DataTableComponent
{
    use LivewireDatatableTrait;

    public function columns(): array
    {
        return [
            Column::make('ID', 'kode')
                ->sortable(),
            Column::make('Status', 'status')
                ->sortable()
                ->searchable(),
            Column::make('Nama', 'nama')
                ->sortable()
                ->searchable(),
            Column::make('Alamat', 'alamat'),
            Column::make('Kota / Kab', 'regency.name')
                ->searchable(),
            Column::make(''),
        ];
    }

    public function query(): Builder
    {
        return SupplierRepository::datatables();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.supplier_set_table';
    }
}
