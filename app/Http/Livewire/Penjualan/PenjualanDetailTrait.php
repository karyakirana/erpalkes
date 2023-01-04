<?php namespace App\Http\Livewire\Penjualan;

use App\Models\Master\Produk;

trait PenjualanDetailTrait
{
    public $produk_id, $produk_nama;
    public $harga;
    public $diskon;
    public $jumlah;
    public $sub_total;

    public $dataDetail = [];
    public $update = false;
    public $index;

    protected function getProduk(Produk $produk)
    {
        $this->produk_id = $produk->id;
        $this->produk_nama = $produk->nama_produk;
        $this->harga = $produk->harga;
        $this->satuan_jual = $produk->satuan_jual;
    }

    protected function setLine()
    {
        // update false
        if (!$this->update){
            $this->dataDetail[] = [
                'produk_id' => $this->produk_id,
                'produk_nama' => $this->produk_nama,
                'harga' => $this->harga,
                'diskon' => $this->diskon,
                'jumlah' => $this->jumlah,
                'satuan_jual' => $this->satuan_jual,
                'sub_total' => $this->sub_total
            ];
        }

        // update true
        if ($this->update){
            $index = $this->index;
            $this->dataDetail[$index]['produk_id'] = $this->produk_id;
            $this->dataDetail[$index]['produk_nama'] = $this->produk_nama;
            $this->dataDetail[$index]['harga'] = $this->harga;
            $this->dataDetail[$index]['diskon'] = $this->diskon;
            $this->dataDetail[$index]['jumlah'] = $this->jumlah;
            $this->dataDetail[$index]['satuan_jual'] = $this->satuan_jual;
            $this->dataDetail[$index]['sub_total'] = $this->sub_total;
        }
    }

    protected function getLine($index)
    {
        $this->update = true;
        $this->index = $index;
        $this->produk_id = $this->dataDetail[$index]['produk_id'];
        $this->produk_nama = $this->dataDetail[$index]['produk_nama'];
        $this->harga = $this->dataDetail[$index]['harga'];
        $this->diskon = $this->dataDetail[$index]['diskon'];
        $this->jumlah = $this->dataDetail[$index]['jumlah'];
        $this->satuan_jual = $this->dataDetail[$index]['satuan_jual'];
        $this->sub_total = $this->dataDetail[$index]['sub_total'];
    }

    protected function removeLine($index)
    {
        unset($this->dataDetail[$index]);
        $this->dataDetail = array_values($this->dataDetail);
    }
}
