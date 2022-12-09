<?php namespace App\Http\Livewire\Master;

use App\Http\Requests\Master\ProdukRequest;
use App\Mine\SubMaster\ProdukRepository;

trait ProdukFormTrait
{
    public $produk_id;
    public $produk_kategori_id;
    public $produk_sub_kategori;
    public $kode;
    public $is_expired;
    public $nama_produk;
    public $tipe;
    public $isi_kemasan;
    public $satuan_beli;
    public $satuan_jual;
    public $produk_image_id;
    public $produk_brosur_id;
    public $harga;
    public $keterangan;

    public function rules()
    {
        return (new ProdukRequest())->rules();
    }

    public function messages()
    {
        return (new ProdukRequest())->messages();
    }

    protected function loadProduk($produk_id)
    {
        $produk = ProdukRepository::getById($produk_id);
        $this->produk_kategori_id = $produk->produk_kategori_id;
        $this->produk_sub_kategori = $produk->produk_sub_kategori;
        $this->kode = $produk->kode;
        $this->nama_produk = $produk->nama_produk;
        $this->tipe = $produk->tipe;
        $this->isi_kemasan = $produk->isi_kemasan;
        $this->satuan_beli = $produk->satuan_beli;
        $this->satuan_jual = $produk->satuan_jual;
        $this->produk_image_id = $produk->produk_image_id;
        $this->produk_brosur_id = $produk->produk_brosur_id;
        $this->harga = $produk->harga;
        $this->keterangan = $produk->keterangan;
    }
}
