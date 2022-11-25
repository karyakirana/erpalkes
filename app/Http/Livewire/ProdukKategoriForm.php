<?php

namespace App\Http\Livewire;

use App\Models\Master\ProdukKategori;
use Livewire\Component;

class ProdukKategoriForm extends Component
{
    public $kategori_id;
    public $kode;
    public $kategori;
    public $keterangan;

    public $update = false;

    protected $listeners = [
        'store',
        'edit',
        'update',
        'resetForm'
    ];

    public function resetForm()
    {
        $this->update = false;
        $this->reset(['kategori_id', 'kategori', 'keterangan']);
        $this->resetErrorBag();
        $this->resetValidation();
    }

    protected function kode()
    {
        $area = ProdukKategori::latest('kode_area')->first();
        if ($area == null){
            $num = 1;
        } else {
            $lastNum = (int) $area->last_num_master;
            $num = $lastNum + 1;
        }
        return "A".sprintf("%05s", $num);
    }

    public function store()
    {
        ProdukKategori::create([
            'kode' => $this->kode(),
            'kategori' => $this->kategori,
            'keterangan' => $this->keterangan
        ]);
        $this->emit('modalProdukKategoriHide');
    }

    public function edit($id)
    {
        $this->update = true;
        $kategori = ProdukKategori::find($id);
        $this->kode = $kategori->kode;
        $this->kategori = $kategori->kategori;
        $this->keterangan = $kategori->keterangan;
        $this->emit('modalProdukKategoriShow');
    }

    public function update()
    {
        $kategori = ProdukKategori::find($this->kategori_id);
        $kategori->update([
            'kategori' => $this->kategori,
            'keterangan' => $this->keterangan
        ]);
        $this->emit('modalProdukKategoriHide');
    }

    public function render()
    {
        return view('livewire.produk-kategori-form');
    }
}
