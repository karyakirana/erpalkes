<?php namespace App\Http\Livewire\Master;

use App\Http\Requests\Master\ProdukRequest;
use App\Mine\SubMaster\ProdukRepository;

trait ProdukFormTrait
{
    public $produk_id;
    public $produk_kategori_id;
    public $produk_sub_kategori_id;
    public $nama_produk;
    public $merk;
    public $tipe;
    public $satuan_beli;
    public $satuan_jual;
    public $harga;
    public $buffer_stock;
    public $minimum_stock;
    public $keterangan;

    public $dataImage = [];
    public $dataHarga = [];
    public $dataKemasan = [];

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
        $this->produk_sub_kategori_id = $produk->produk_sub_kategori_id;
        $this->nama_produk = $produk->nama_produk;
        $this->tipe = $produk->tipe;
        $this->merk = $produk->merk;
        $this->satuan_beli = $produk->satuan_beli;
        $this->satuan_jual = $produk->satuan_jual;
        $this->harga = $produk->harga;
        $this->buffer_stock = $produk->buffer_stock;
        $this->minimum_stock = $produk->minimum_stock;
        $this->keterangan = $produk->keterangan;

        foreach ($produk->produkKemasan as $row){
            $this->dataKemasan[] = [
                'kemasan' => $row->kemasan,
                'isi' => $row->isi
            ];
        }

        $this->dataHarga['persen_diskon'] = $produk->produkHarga->persen_diskon;
        $this->dataHarga['harga_diskon'] = $produk->produkHarga->harga_diskon;

    }
}
