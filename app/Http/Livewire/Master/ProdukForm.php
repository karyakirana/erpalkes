<?php

namespace App\Http\Livewire\Master;

use App\Mine\SubMaster\ProdukRepository;
use App\Models\Master\Produk;
use Livewire\Component;

class ProdukForm extends Component
{
    use ProdukFormTrait;

    public $update = false;

    protected $listeners = [
        'setSubKategori'
    ];

    public function mount($produk_id = null)
    {
        if ($produk_id){
            $this->update = true;
            $this->loadProduk($produk_id);
        }
    }

    public function store()
    {
        $data = $this->validate();
        //dd($data);
        $produk = ProdukRepository::store($data);
        // redirect
        session()->flash('message', 'Data '.$this->nama_produk.' sudah disimpan.');
        return redirect()->to(route('produk'));
    }

    public function update()
    {
        $data = $this->validate();
        $produk = ProdukRepository::update($data, $this->produk_id);
        // redirect
        session()->flash('message', 'Data '.$this->nama_produk.' sudah diperbarui.');
        return redirect()->to(route('produk'));
    }

    public function render()
    {
        return view('livewire.master.produk-form');
    }
}
