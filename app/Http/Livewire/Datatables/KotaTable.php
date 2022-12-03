<?php

namespace App\Http\Livewire\Datatables;

use App\Models\Regency;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class KotaTable extends DataTableComponent
{

    public function columns(): array
    {
        return [
            Column::make('Provinsi','province.name')
            ->searchable()
            ->sortable(),
            Column::make('Kota', 'name')
            ->searchable()
            ->sortable(),
        ];
    }

    public function query(): Builder
    {
        return Regency::query()->with('province');
    }

    public function rowView(): string
    {
        // Becomes /resources/views/location/to/my/row.blade.php
        return 'livewire-tables.rows.kota_table';
    }

}
