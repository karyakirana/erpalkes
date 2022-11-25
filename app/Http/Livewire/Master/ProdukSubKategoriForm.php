<?php

namespace App\Http\Livewire\Master;

use App\Models\Master\ProdukSubKategori;
use Livewire\Component;

class ProdukSubKategoriForm extends Component
{
    public $kategori_sub_id;
    public $kategori_id;
    public $kode;
    public $nama_sub_kategori;
    public $keterangan;

    public $update = false;

    public function resetForm()
    {
        //
    }

    public function kode()
    {
        return null;
    }

    public function store()
    {
        $subKategori = ProdukSubKategori::create([
            'kategori_id' => $this->kategori_id,
            'kode' => '',
            'nama_sub_kategori' => $this->nama_sub_kategori,
            'keterangan' => $this->keterangan
        ]);
        $this->emit('modalSubKategoriHide');
    }

    public function edit($id)
    {
        $this->update = true;
        $subKategori = ProdukSubKategori::find($id);
        $this->kategori_id = $subKategori->kategori_id;
        $this->nama_sub_kategori = $subKategori->nama_sub_kategori;
        $this->keterangan = $subKategori->keterangan;
        $this->emit('modalSubKategoriShow');
    }

    public function update()
    {
        $subKategori = ProdukSubKategori::find($this->kategori_sub_id);
        $subKategori->update([
            'kategori_id' => $this->kategori_id,
            'nama_sub_kategori' => $this->nama_sub_kategori,
            'keterangan' => $this->keterangan
        ]);
        $this->emit('modalSubKategoriHide');
    }

    public function render()
    {
        return view('livewire.master.produk-sub-kategori-form');
    }
}
