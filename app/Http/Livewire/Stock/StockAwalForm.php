<?php

namespace App\Http\Livewire\Stock;

use Livewire\Component;

class StockAwalForm extends Component
{
    public $total_barang;
    public $total_nominal;
    public $keterangan;

    public $index;
    public $dataDetail = [];

    public function render()
    {
        return view('livewire.stock.stock-awal-form');
    }
}
