<?php namespace App\Http\Livewire\Pembelian;

use App\Mine\SubPembelian\PembelianService;

class LoadPembelianPreorderTrait
{
    public $pembelian_preorder_id;
    public $pembelian_preorder_kode;
    public $supplier_id, $supplier_nama;
    public $total_barang, $ppn, $biaya_lain;
    public $total_bayar;
    public $keterangan;

    public $total_sub_total;

    public $dataDetail = [];

    public function setPreorder($pembelian_preorder_id)
    {
        $preorder = (new PembelianService())->handleLoadPembelianPreorder($pembelian_preorder_id);
        $this->pembelian_preorder_id = $preorder->id;
        $this->pembelian_preorder_kode = $preorder->kode;
        $this->supplier_id = $preorder->supplier_id;
        $this->supplier_nama = $preorder->supplier->nama_supplier;
        $this->total_barang = $preorder->total_barang;
        $this->ppn = $preorder->ppn;
        $this->biaya_lain = $preorder->biaya_lain;
        $this->total_bayar = $preorder->total_bayar;
        $this->keterangan = $preorder->keterangan;

        foreach ($preorder->pembelianPoDetail as $item) {
            $this->dataDetail[] = [
                'produk_id' => $item->produk_id,
                'produk_nama' => $item->produk->nama_produk,
                'kemasan' => $item->kemasan,
                'satuan_jual' => $item->produk->satuan_jual,
                'harga' => $item->harga,
                'jumlah' => $item->jumlah,
                'diskon' => $item->diskon,
                'sub_total' => $item->sub_total
            ];
        }
        $this->hitungTotalSubTotal();
    }

    protected function hitungTotalSubTotal()
    {
        $this->total_sub_total = array_sum(array_column($this->dataDetail, 'sub_total'));
        $this->total_bayar = (int) $this->ppn + (int) $this->biaya_lain + (int) $this->total_sub_total;
    }
}
