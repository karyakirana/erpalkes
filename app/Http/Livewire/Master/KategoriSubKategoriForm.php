<?php

namespace App\Http\Livewire\Master;

use App\Http\Requests\Master\KategoriSubKategoriRequest;
use App\Mine\SubMaster\ProdukKategoriRepository;
use App\Mine\SubMaster\ProdukSubKategoriRepository;
use Livewire\Component;

class KategoriSubKategoriForm extends Component
{
    public $kategori_id;
    public $nama_kategori, $keterangan_kategori;
    public $dataSubKategori, $sub_kategori_id;
    public $nama_sub_kategori, $keterangan_sub_kategori;

    protected $listeners = [
        'openFormSubKategori'
    ];

    public function mount($produk_sub_kategori_id = null)
    {
        //dd($produk_sub_kategori_id);
        $this->dataSubKategori = collect();
        if (!is_null($produk_sub_kategori_id)){
            $subKategori = ProdukSubKategoriRepository::getById($produk_sub_kategori_id);
            if ($subKategori){
                $this->dataSubKategori = ProdukSubKategoriRepository::datatables()->where('kategori_id', $subKategori->kategori_id)->get();
                $this->sub_kategori_id = $subKategori->id;
                $this->kategori_id = $subKategori->kategori_id;
            }
        }
    }

    public function rules()
    {
        //
    }

    public function updatedKategoriId($kategori_id)
    {
        $this->dataSubKategori = ProdukSubKategoriRepository::datatables()->where('kategori_id', $kategori_id)->get();
        $this->emit('selectedKategoriId', $kategori_id);
    }

    public function updatedSubKategoriId($sub_kategori_id)
    {
        $this->emit('selectedSubKategoriId', $sub_kategori_id);
    }

    public function storeKategori()
    {
        $this->validate([
            'nama_kategori' => 'required'
        ]);
        ProdukKategoriRepository::store([
            'nama' => $this->nama_kategori,
            'keterangan' => $this->keterangan_kategori
        ]);
        $this->emit('modalKategoriHide');
        $this->reset(['nama_kategori', 'keterangan_kategori']);
    }

    public function openFormSubKategori()
    {
        $this->validate([
            'kategori_id' => 'required'
        ]);
        $this->emit('modalSubKategoriShow');
    }

    public function storeSubKategori()
    {
        $this->validate([
            'nama_sub_kategori' => 'required',
        ]);
        ProdukSubKategoriRepository::store([
            'kategori_id' => $this->kategori_id,
            'nama_sub_kategori' => $this->nama_sub_kategori,
            'keterangan' => $this->keterangan_sub_kategori
        ]);
        $this->emit('modalSubKategoriHide');
        $this->reset([
            'nama_sub_kategori', 'keterangan_sub_kategori'
        ]);
        $this->updatedKategoriId($this->kategori_id);
    }


    public function render()
    {
        return view('livewire.master.kategori-sub-kategori-form', [
            'dataKategori' => ProdukKategoriRepository::datatables()->get()
        ]);
    }
}
