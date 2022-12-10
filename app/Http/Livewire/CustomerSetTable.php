<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Datatables\LivewireDatatableTrait;
use App\Mine\SubMaster\CustomerRepository;
use App\Models\Master\Customer;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CustomerSetTable extends DataTableComponent
{

    use LivewireDatatableTrait;

    public function columns(): array
    {
        return [
            Column::make('ID', 'kode')
                ->sortable(),
            Column::make('Instansi', 'jenis_instansi')
                ->sortable()
                ->searchable(),
            Column::make('Nama', 'nama_customer')
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
        return CustomerRepository::datatables();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.customer_set_table';
    }
}
