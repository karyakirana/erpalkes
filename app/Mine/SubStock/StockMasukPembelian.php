<?php namespace App\Mine\SubStock;

use App\Models\Pembelian\Pembelian;
use App\Models\Stock\StockMasuk;
use App\Models\Stock\StockMasukDetail;

class StockMasukPembelian
{
    protected $pembelian;

    public function __construct(Pembelian $pembelian)
    {
        $this->pembelian = $pembelian;
    }

    public function getByPembelian()
    {
        return $this->pembelian->stockMasuk()->first();
    }

    public function detail($stockMasukId)
    {
        foreach ($this->pembelian->pembelianDetail as $item) {
            StockMasukDetail::create([
                'stock_masuk_id' => $stockMasukId,
                'produk_id' => $item->produk_id,
                'tgl_produksi' => $item->tgl_produksi,
                'tgl_expired' => $item->tgl_expired,
                'jumlah' => $item->jumlah
            ]);
            // todo stock update
        }
    }

    public function store()
    {
        $stockMasuk = StockMasuk::create([
            'active_cash' => $this->pembelian->active_cash,
            'kode' => StockMasukRepository::kode(),
            'status_masuk' => $this->pembelian->status_pembelian,
            'stockable_masuk_type' => $this->pembelian::class,
            'stockable_masuk_id' => $this->pembelian->id,
            'customer_id' => null,
            'supplier_id' => $this->pembelian->supplier_id,
            'user_id' => $this->pembelian->user_id,
            'total_barang' => $this->pembelian->total_barang,
            'keterangan' => $this->pembelian->keterangan,
        ]);
        $this->detail($stockMasuk->id);
        return $stockMasuk;
    }

    public function update()
    {
        $stockMasuk = $this->getByPembelian();
        $stockMasuk->update([
            'status_masuk' => $this->pembelian->status_pembelian,
            'stockable_masuk_type' => $this->pembelian::class,
            'stockable_masuk_id' => $this->pembelian->id,
            'customer_id' => null,
            'supplier_id' => $this->pembelian->supplier_id,
            'user_id' => $this->pembelian->user_id,
            'total_barang' => $this->pembelian->total_barang,
            'keterangan' => $this->pembelian->keterangan,
        ]);
        $this->detail($stockMasuk->id);
        return $stockMasuk;
    }

    public function destroyDetail()
    {
        $stockMasuk = $this->getByPembelian();
        return $stockMasuk->stockMasukDetail->delete();
    }

    public function destroy()
    {
        $this->destroyDetail();
        return $this->getByPembelian()->delete();
    }
}
