<?php namespace App\Mine\SubStock;

use App\Models\Pembelian\Pembelian;
use App\Models\Stock\StockMasuk;
use App\Models\Stock\StockMasukDetail;

class StockMasukPembelian
{
    public static function storeFromPembelian(Pembelian $pembelian, $data)
    {
        $stockMasuk = StockMasuk::create([
            'stockable_masuk_id' => $pembelian->id,
            'stockable_masuk_type' => $pembelian::class,
            'customer_id' => null,
            'supplier_id' => $pembelian->supplier_id,
            'active_cash' => $pembelian->active_cash,
            'kode' => StockMasukRepository::kode(),
            'kondisi' => 'baik',
            'status' => 'tercetak',
            'gudang_id' => $data['gudang_id'],
            'user_id' => $pembelian->user_id,
            'total_barang' => $pembelian->total_barang,
            'keterangan' => $pembelian->keterangan
        ]);
        foreach ($data['dataDetail'] as $row) {
            StockRepository::build(
                $stockMasuk->active_cash,
                $stockMasuk->kondisi,
                $stockMasuk->gudang_id,
                'stock_masuk',
                $row
            )->addStockIn();
        }
        $stockMasuk->stockMasukDetail()->createMany($data['dataDetail']);
        return $stockMasuk;
    }

    public static function updateFromPembelian(Pembelian $pembelian, $data)
    {
        $stockMasuk = StockMasukRepository::getByMorph($pembelian->id, $pembelian::class);
        $stockMasuk->update([
            'customer_id' => null,
            'supplier_id' => $pembelian->supplier_id,
            'active_cash' => $pembelian->active_cash,
            'kondisi' => 'baik',
            'status' => 'tercetak',
            'gudang_id' => $data['gudang_id'],
            'user_id' => $pembelian->user_id,
            'total_barang' => $pembelian->total_barang,
            'keterangan' => $pembelian->keterangan
        ]);
        foreach ($data['dataDetail'] as $row) {
            StockRepository::build(
                $stockMasuk->active_cash,
                $stockMasuk->kondisi,
                $stockMasuk->gudang_id,
                'stock_masuk',
                $row
            )->addStockIn();
        }
        $stockMasuk->stockMasukDetail()->createMany($data['dataDetail']);
        return $stockMasuk;
    }

    public static function destroyDetailFromPembelian(Pembelian $pembelian)
    {
        $stockMasuk = StockMasukRepository::getByMorph($pembelian->id, $pembelian::class);
        foreach ($stockMasuk->stockMasukDetail as $item) {
            StockRepository::build(
                $stockMasuk->active_cash,
                $stockMasuk->kondisi,
                $stockMasuk->gudang_id,
                'stock_masuk',
                $item
            )->rollbackStockIn();
        }
        return $stockMasuk->stockMasukDetail()->delete();
    }

    public static function destroyFromPembelian(Pembelian $pembelian)
    {
        $stockMasuk = StockMasukRepository::getByMorph($pembelian->id, $pembelian::class);
        foreach ($stockMasuk->stockMasukDetail as $item) {
            StockRepository::build(
                $stockMasuk->active_cash,
                $stockMasuk->kondisi,
                $stockMasuk->gudang_id,
                'stock_masuk',
                $item
            )->rollbackStockIn();
        }
        $stockMasuk->stockMasukDetail()->delete();
        return $stockMasuk->delete();
    }
}
