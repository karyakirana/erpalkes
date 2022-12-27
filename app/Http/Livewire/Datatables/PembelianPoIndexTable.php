<?php

namespace App\Http\Livewire\Datatables;

use App\Mine\SubPembelian\PembelianPreorderRepository;
use Illuminate\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PembelianPoIndexTable extends DataTableComponent
{
    use LivewireDatatableTrait;
    public function columns(): array
    {
        return [
            Column::make('ID', 'kode'),
            Column::make('Quotation', 'pembelianQuotation.kode'),
            Column::make('Supplier', 'supplier.nama'),
            Column::make('Status'),
            Column::make('Pembuat'),
            Column::make('')
        ];
    }

    public function query(): Builder
    {
        return PembelianPreorderRepository::getAllCurrentActiveCash();
    }

    public function rowView(): string
    {
        return 'livewire-tables.rows.pembelian_po_index_table';
    }
}
