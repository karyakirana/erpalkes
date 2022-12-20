<?php

namespace App\Http\Livewire\Datatables;

use App\Mine\SubMaster\CustomerCNRepository;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class CustomercnIndexTable extends DataTableComponent
{
    use LivewireDatatableTrait;
    public function columns(): array
    {
        return [
            Column::make('ID', 'kode'),
            Column::make('Customer', 'customer.nama'),
            Column::make('Penerima', 'penerima_cn'),
            Column::make('Jabatan', 'jabatan_cn'),
            Column::make('')
        ];
    }

    public function query(): Builder
    {
        return CustomerCNRepository::datatables();
    }

    public function destroy($id)
    {
        CustomerCNRepository::destroy($id);
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.customercn_index_table';
    }
}
