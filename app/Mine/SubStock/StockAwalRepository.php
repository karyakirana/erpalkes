<?php namespace App\Mine\SubStock;

use App\Models\Persediaan\PersediaanAwal;
use App\Models\Stock\StockAwal;

class StockAwalRepository
{
    public static function getByPersediaan(PersediaanAwal $persediaanAwal)
    {
        return $persediaanAwal->stockAwal;
    }

    public static function getAllCurrentActiveCash($deleted = false)
    {
        if ($deleted){
            return StockAwal::withTrashed()
                ->where('active_cash', session('ClosedCash'))
                ->latest()
                ->get();
        }
        return StockAwal::where('active_cash', session('ClosedCash'))
            ->latest()->get();
    }

    public static function getAllByActiveCash()
    {
        return StockAwal::latest()->get();
    }

    public static function kode()
    {
        return null;
    }

    public static function store(PersediaanAwal $persediaanAwal)
    {
        $data['kode'] = self::kode();
        $stockAwal = $persediaanAwal->stockAwal()->create([
            'kode' => self::kode(),
            'user_id' => $persediaanAwal->user_id,
            'total_barang' => $persediaanAwal->total_barang,
            'keterangan' => $persediaanAwal->keterangan
        ]);
        foreach ($persediaanAwal->persediaanAwalDetail as $item) {
            $stockAwal->stockAwalDetail()->create([
                'produk_id' => $item->produk_id,
                'tgl_produksi' => $item->tgl_produksi,
                'tgl_expired' => $item->tgl_expired,
                'jumlah' => $item->jumlah,
            ]);
            // todo update stock
        }
        return $stockAwal;
    }

    public static function update(PersediaanAwal $persediaanAwal)
    {
        $stockAwal = $persediaanAwal->stockAwal();
        $stockAwal->update([
            'user_id' => $persediaanAwal->user_id,
            'total_barang' => $persediaanAwal->total_barang,
            'keterangan' => $persediaanAwal->keterangan
        ]);
        $stockAwal = $persediaanAwal->stockAwal;
        foreach ($persediaanAwal->persediaanAwalDetail as $item) {
            $stockAwal->stockAwalDetail()->create([
                'produk_id' => $item->produk_id,
                'tgl_produksi' => $item->tgl_produksi,
                'tgl_expired' => $item->tgl_expired,
                'jumlah' => $item->jumlah,
            ]);
            // todo update stock
        }
        return $stockAwal;
    }

    public static function deleteDetail(PersediaanAwal $persediaanAwal)
    {
        $stockAwal = $persediaanAwal->stockAwal;
        return $stockAwal->stockAwalDetail()->delete();
    }

    public static function destroy(PersediaanAwal $persediaanAwal)
    {
        $stockAwal = $persediaanAwal->stockAwal;
        $stockAwal->stockAwalDetail()->delete();
        return $stockAwal->delete();
    }
}
