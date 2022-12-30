<?php

namespace App\Http\Livewire\Datatables;

use App\Mine\SubPersediaan\PersediaanAwalRepository;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PersediaanAwalIndexTable extends DataTableComponent
{
    use LivewireDatatableTrait;
    public function columns(): array
    {
        return [
            Column::make('ID', 'kode')
                ->addClass('text-center'),
            Column::make('Kondisi', 'kondisi')
                ->addClass('text-center'),
            Column::make('Gudang', 'gudang.nama')
                ->addClass('text-center'),
            Column::make('Pembuat', 'users.name')
                ->addClass('text-center'),
            Column::make('Barang', 'total_barang')
                ->addClass('text-center'),
            Column::make('Nominal', 'total_nominal')
                ->addClass('text-center'),
            Column::make(''),
        ];
    }

    public function query(): Builder
    {
        return PersediaanAwalRepository::datatables();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.persediaan_awal_index_table';
    }
}
