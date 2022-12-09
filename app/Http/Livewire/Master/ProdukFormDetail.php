<?php

namespace App\Http\Livewire\Master;

use App\Mine\SubMaster\ProdukRepository;
use App\Models\Master\ProdukModelTrait;
use Livewire\Component;

class ProdukFormDetail extends Component
{

    use ProdukFormTrait;

    public function mount($produk_id)
    {
        $produk = ProdukRepository::getById($produk_id);
        $this->loadProduk($produk_id);
    }

    public function edit()
    {
        $this->emit('');
    }

    public function update()
    {
        $data = $this->validate();
        $repo = ProdukRepository::update($data, $this->produk_id);
        $this->emit();
    }


    public function render()
    {
        return view('livewire.master.produk-form-detail');
    }
}
