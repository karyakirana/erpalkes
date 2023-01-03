<?php

namespace App\Http\Livewire\Datatables;

use App\Mine\SubPembelian\PembelianPreorderRepository;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PembelianPreorderSetTable extends DataTableComponent
{
    use LivewireDatatableTrait;

    public function columns(): array
    {
        return [
            Column::make('ID', 'kode'),
            Column::make('Tanggal', 'tgl_pembelian_po'),
            Column::make('Tagihan', 'total_bayar'),
            Column::make('Status'),
            Column::make(''),
        ];
    }

    public function query(): Builder
    {
        return PembelianPreorderRepository::datatables();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.pembelian_preorder_set_table';
    }
}
