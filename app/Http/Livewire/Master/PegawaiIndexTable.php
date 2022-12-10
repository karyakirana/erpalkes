<?php

namespace App\Http\Livewire\Master;

use App\Http\Livewire\Datatables\LivewireDatatableTrait;
use App\Mine\SubMaster\PegawaiRepository;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PegawaiIndexTable extends DataTableComponent
{
    use LivewireDatatableTrait;

    public function columns(): array
    {
        return [
            Column::make('ID', 'kode')
                ->sortable()
                ->searchable(),
            Column::make('Nama', 'nama_pegwai')
                ->sortable()
                ->searchable(),
            Column::make('Jabatan', 'jabatan.nama_jabatan')
                ->sortable(),
            Column::make('Telepon')
                ->searchable()
                ->searchable(),
            Column::make('')
        ];
    }

    public function query(): Builder
    {
        return PegawaiRepository::datatables();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.pegawai_index_table';
    }
}
