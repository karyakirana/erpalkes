<?php

namespace App\Http\Livewire\Master;

use App\Http\Requests\Master\KategoriSubKategoriRequest;
use Livewire\Component;

class KategoriSubKategoriForm extends Component
{
    public $produk_kategori_id;
    public $produk_kategori_nama;
    public $produk_kategori_keterangan;

    public $produk_sub_kategori_id;
    public $produk_sub_kategori_nama;
    public $produk_sub_kategori_keterangan;

    public function mount($produk_sub_kategori_id = null)
    {
        //
    }

    public function rules()
    {
        return (new KategoriSubKategoriRequest())->rules();
    }

    public function storeKategori()
    {
        //
    }

    public function updateKategori()
    {
        //
    }

    public function storeSubKategori()
    {
        //
    }

    public function updateSubKategori()
    {
        //
    }


    public function render()
    {
        return view('livewire.master.kategori-sub-kategori-form');
    }
}
