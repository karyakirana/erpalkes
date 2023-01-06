<?php namespace App\Http\Livewire\Penjualan;

use App\Mine\SubPenjualan\PenjualanService;

trait LoadPenjualanPreorderTrait
{
    public $penjualan_preorder_id, $penjualan_preorder_kode;
    public $customer_id, $customer_nama;
    public $sales_id, $sales_nama;
    public $total_sub_total;
    public $total_barang;
    public $total_ppn;
    public $total_biaya_lain;
    public $total_bayar;
    public $keterangan;

    public $dataDetail = [];
    public $index;
    public $produk_id, $produk_nama, $harga, $harga_setelah_diskon;
    public $kemasan, $satuan_jual;
    public $jumlah, $diskon, $sub_total;

    public function setPreorder($penjualan_preorder_id)
    {
        $preorder = (new PenjualanService())->handleLoadFromPreorder($penjualan_preorder_id);
        $this->penjualan_preorder_id = $preorder->id;
        $this->penjualan_preorder_kode = $preorder->kode;
        $this->customer_id = $preorder->customer_id;
        $this->customer_nama = $preorder->customer->nama_customer;
        $this->sales_id = $preorder->sales_id;
        $this->sales_nama = $preorder->sales->nama;
        $this->total_barang = $preorder->total_barang;
        $this->total_ppn = $preorder->total_ppn;
        $this->total_biaya_lain = $preorder->total_biaya_lain;
        $this->total_bayar = $preorder->total_bayar;
        $this->keterangan = $preorder->keterangan;

        foreach ($preorder->penjualanPreorderDetail as $item) {
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
        $this->total_bayar = (int) $this->total_ppn + (int) $this->total_biaya_lain + (int) $this->total_sub_total;
    }
}
