<?php namespace App\Http\Livewire\Master;

use App\Models\Master\Produk;

trait ProdukSetTrait
{
    public $produk_id, $produk_nama;

    public function setProduk(Produk $produk)
    {
        $this->produk_id = $produk->id;
        $this->produk_nama = $produk->nama_produk."\n"
            .$produk->produkSubKategori->nama_sub_kategori."\n";
    }
}
