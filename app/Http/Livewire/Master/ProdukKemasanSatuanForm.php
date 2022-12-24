<?php

namespace App\Http\Livewire\Master;

use Livewire\Component;

class ProdukKemasanSatuanForm extends Component
{
    public $dataKemasan = [];

    public function mount($produk_id = null)
    {
        $this->dataKemasan = [
            ''
        ];
    }
    public function add()
    {
        //
    }
    public function render()
    {
        return view('livewire.master.produk-kemasan-satuan-form');
    }
}
