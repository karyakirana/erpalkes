<?php

namespace App\Http\Livewire\Datatables;

use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class UserIndexTable extends DataTableComponent
{
    use LivewireDatatableTrait;
    public function columns(): array
    {
        return [
            Column::make('NO'),
            Column::make('Pegawai', 'pegawai.nama'),
            Column::make('Username'),
            Column::make('Email'),
            Column::make('')
        ];
    }

    public function query(): Builder
    {
        return User::query()
            ->whereNotNull('pegawai_id');
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.user_index_table';
    }
}
