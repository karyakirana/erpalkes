<?php namespace App\Http\Livewire;

use App\Models\Master\Produk;

trait ProdukTransaksiLineTrait
{
    public $produk_id, $produk_nama;
    public $harga;
    public $diskon;
    public $jumlah;
    public $sub_total;

    public $dataDetail = [];
    public $index;

    public function loadProdukNonDiscount($produk_id)
    {
        //
    }

    public function loadProduk($produk_id)
    {
        //
    }

    public function resetForm()
    {
        //
    }

    public function setProduk(Produk $produk)
    {
        $this->produk_id = $produk->id;
        $this->produk_nama = $produk->nama_produk."\n"
            .$produk->produkSubKategori->nama_sub_kategori."\n";
        $this->harga = $produk->harga;
    }

    public function addLineNonDiscount()
    {
        $this->dataDetail[] = [
            'produk_id' => $this->produk_id,
            'produk_nama' => $this->produk_nama,
            'harga' => $this->harga,
            'jumlah' => $this->jumlah,
            'sub_total' => $this->harga * $this->jumlah
        ];
    }

    public function addLine()
    {
        $this->dataDetail[] = [
            'produk_id' => $this->produk_id,
            'produk_nama' => $this->produk_nama,
            'harga' => $this->harga,
            'diskon' => $this->diskon,
            'jumlah' => $this->jumlah,
            'sub_total' => $this->sub_total
        ];
    }

    public function editLineNonDiscount($index)
    {
        $this->index = $index;
        $this->produk_id = $this->dataDetail[$index]['produk_id'];
        $this->produk_nama = $this->dataDetail[$index]['produk_nama'];
        $this->harga = $this->dataDetail[$index]['harga'];
        $this->jumlah = $this->dataDetail[$index]['jumlah'];
        $this->sub_total = $this->dataDetail[$index]['sub_total'];
    }

    public function editLine($index)
    {
        $this->editLineNonDiscount($index);
        $this->diskon = $this->dataDetail[$index]['diskon'];
    }

    public function updateLineNonDiscount()
    {
        $index = $this->index;
        $this->dataDetail[$index]['produk_id'] = $this->produk_id;
        $this->dataDetail[$index]['produk_nama'] = $this->produk_nama;
        $this->dataDetail[$index]['harga'] = $this->harga;
        $this->dataDetail[$index]['jumlah'] = $this->jumlah;
        $this->dataDetail[$index]['sub_total'] = $this->sub_total;
        $this->resetForm();
    }

    public function updateLine()
    {
        $index = $this->index;
        $this->updateLineNonDiscount();
        $this->dataDetail[$index]['diskon'] = $this->diskon;
        $this->resetForm();
    }

    public function destroyLine($index)
    {
        unset($this->dataDetail[$index]);
        $this->dataDetail = array_values($this->dataDetail);
    }
}
