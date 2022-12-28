<?php

namespace App\Http\Livewire\Datatables;

use App\Mine\SubPembelian\PembelianRepository;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PembelianSetTable extends DataTableComponent
{
    use LivewireDatatableTrait;
    public function columns(): array
    {
        return [
            Column::make('ID', 'kode'),
            Column::make('Tanggal', 'tgl_nota'),
            Column::make('Tempo', 'tgl_tempo'),
            Column::make('Supplier', 'supplier.nama'),
            Column::make('Tagihan', 'total_bayar'),
            Column::make('Status'),
            Column::make(''),
        ];
    }

    public function query(): Builder
    {
        return PembelianRepository::datatables();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.pembelian_set_table';
    }
}
