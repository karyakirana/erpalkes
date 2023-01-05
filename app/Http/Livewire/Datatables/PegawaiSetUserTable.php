<?php

namespace App\Http\Livewire\Datatables;

use App\Models\Master\Pegawai;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PegawaiSetUserTable extends DataTableComponent
{
    use LivewireDatatableTrait;
    public function columns(): array
    {
        return [
            Column::make('ID', 'kode'),
            Column::make('Nama'),
            Column::make('Alamat'),
            Column::make('Telepon'),
            Column::make(''),
        ];
    }

    public function query(): Builder
    {
        return Pegawai::query()
            ->doesntHave('users');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.pegawai_set_user_table';
    }
}
