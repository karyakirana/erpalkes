<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Datatables\LivewireDatatableTrait;
use App\Mine\SubMaster\PenerimaCnRepository;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PenerimaCnIndexTable extends DataTableComponent
{
    use LivewireDatatableTrait;
    public function columns(): array
    {
        return [
            Column::make('ID', 'kode'),
            Column::make('Customer', 'customer.nama_customer'),
            Column::make('Jabatan', 'jabatan_cn'),
            Column::make('Unit', 'unit_cn'),
            Column::make('Keterangan' ),
            Column::make('' ),
        ];
    }

    public function query(): Builder
    {
        return PenerimaCnRepository::datatables();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.penerima_cn_index_table';
    }
}
