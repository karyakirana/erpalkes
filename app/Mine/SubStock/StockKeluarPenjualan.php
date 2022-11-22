<?php namespace App\Mine\SubStock;

use App\Models\Penjualan\Penjualan;
use App\Models\Stock\StockKeluar;
use App\Models\Stock\StockKeluarDetail;

class StockKeluarPenjualan
{
    protected $penjualan;

    public function __construct(Penjualan $penjualan)
    {
        $this->penjualan = $penjualan;
    }

    public function getById()
    {
        return $this->penjualan->stockKeluar()->first();
    }

    public function detail($stockKeluarId)
    {
        foreach ($this->penjualan->penjualanDetail as $item) {
            StockKeluarDetail::create([
                'stock_keluar_id' => $stockKeluarId,
                'stock_id' => $item->stock_id,
                'jumlah' => $item->jumlah
            ]);
        }
        // todo update stock
    }

    public function store()
    {
        $stockKeluar = StockKeluar::create([
            'active_cash' => $this->penjualan->active_cash,
            'kode' => StockKeluarRepository::kode(),
            'status_keluar' => $this->penjualan->status_invoice,
            'stockable_keluar_id' => $this->penjualan->id,
            'stockable_keluar_type' => $this->penjualan::class,
            'customer_id' => $this->penjualan->customer_id,
            'supplier_id' => null,
            'user_id' => $this->penjualan->user_id,
            'total_barang' => $this->penjualan->total_barang,
            'keterangan' => $this->penjualan->keterangan
        ]);
        $this->detail($stockKeluar->id);
        return $stockKeluar;
    }

    public function update()
    {
        $stockKeluar = $this->getById();
        $stockKeluar->update([
            'status_keluar' => $this->penjualan->status_invoice,
            'stockable_keluar_id' => $this->penjualan->id,
            'stockable_keluar_type' => $this->penjualan::class,
            'customer_id' => $this->penjualan->customer_id,
            'supplier_id' => null,
            'user_id' => $this->penjualan->user_id,
            'total_barang' => $this->penjualan->total_barang,
            'keterangan' => $this->penjualan->keterangan
        ]);
        $this->detail($stockKeluar->id);
        return $stockKeluar;
    }

    public function destroyDetail()
    {
        $stockKeluar = $this->getById();
        return $stockKeluar->stockKeluarDetail->delete();
    }

    public function destroy()
    {
        $this->destroyDetail();
        return $this->getById()->delete();
    }
}
