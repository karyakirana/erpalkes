<?php namespace App\Mine\SubStock;

use App\Models\Penjualan\Penjualan;
use App\Models\Stock\StockKeluar;
use App\Models\Stock\StockKeluarDetail;

class StockKeluarPenjualan
{
    /**
     * Transaksi Ketika Penjualan dibuat dulu
     */
    public static function storeFromPenjualan(Penjualan $penjualan, $data)
    {
        $stockKeluar = StockKeluar::create([
            'stockable_keluar_id' => $penjualan->id,
            'stockable_keluar_type' => $penjualan::class,
            'customer_id' => $penjualan->customer_id,
            'tgl_keluar' => $penjualan->tgl_penjualan,
            'supplier_id' => null,
            'active_cash' => $penjualan->active_cash,
            'kode' => StockKeluarRepository::kode(),
            'kondisi' => 'baik',
            'status' => 'tercetak',
            'gudang_id' => $data['gudang_id'],
            'user_id' => $penjualan->user_id,
            'total_barang' => $penjualan->total_barang,
            'keterangan' => $penjualan->keterangan
        ]);
        foreach ($data['dataDetail'] as $row) {
            $stock = StockRepository::build(
                $stockKeluar->active_cash,
                $stockKeluar->kondisi,
                $stockKeluar->gudang_id,
                'stock_keluar',
                $row
            )->addStockOut();
            $stockKeluar->stockKeluarDetail()->create([
                'stock_id' => $stock,
                'jumlah' => $row->jumlah ?? $row['jumlah'],
            ]);
        }
        return $stockKeluar;
    }

    public static function updateFromPenjualan(Penjualan $penjualan, $data)
    {
        $stockKeluar = StockKeluarRepository::getByMorph($penjualan->id, $penjualan::class);
        $stockKeluar->update([
            'customer_id' => $penjualan->customer_id,
            'kondisi' => 'baik',
            'status' => 'tercetak',
            'gudang_id' => $data['gudang_id'],
            'user_id' => $penjualan->user_id,
            'total_barang' => $penjualan->total_barang,
            'keterangan' => $penjualan->keterangan
        ]);
        $stockKeluar = $stockKeluar->refresh();
        foreach ($data['dataDetail'] as $row) {
            $stock = StockRepository::build(
                $stockKeluar->active_cash,
                $stockKeluar->kondisi,
                $stockKeluar->gudang_id,
                'stock_keluar',
                $row
            )->addStockOut();
            $stockKeluar->stockKeluarDetail()->create([
                'stock_id' => $stock,
                'jumlah' => $row->jumlah ?? $row['jumlah'],
            ]);
        }
        $stockKeluar->stockKeluarDetail()->createMany($data['dataDetail']);
        return $stockKeluar;
    }

    public static function destroyDetailFromPenjualan(Penjualan $penjualan)
    {
        $stockKeluar = StockKeluarRepository::getByMorph($penjualan->id, $penjualan::class);
        foreach ($stockKeluar->stockKeluarDetail as $item) {
            StockRepository::build(
                $stockKeluar->active_cash,
                $stockKeluar->kondisi,
                $stockKeluar->gudang_id,
                'stock_keluar',
                $item
            )->rollbackStockOut();
        }
        return $stockKeluar->stockKeluarDetail()->delete();
    }

    public static function destroyFromPenjualan(Penjualan $penjualan)
    {
        $stockKeluar = StockKeluarRepository::getByMorph($penjualan->id, $penjualan::class);
        foreach ($stockKeluar->stockKeluarDetail as $item) {
            StockRepository::build(
                $stockKeluar->active_cash,
                $stockKeluar->kondisi,
                $stockKeluar->gudang_id,
                'stock_keluar',
                $item
            )->rollbackStockOut();
        }
        $stockKeluar->stockKeluarDetail()->delete();
        $stockKeluar->delete();
    }
}
