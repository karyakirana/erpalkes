<?php namespace App\Mine\SubStock;

use App\Models\Persediaan\PersediaanAwal;
use App\Models\Stock\StockAwal;

class StockAwalRepository
{
    public static function getByPersediaan(PersediaanAwal $persediaanAwal)
    {
        return $persediaanAwal->stockAwal;
    }

    public static function datatables($deleted = false)
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

    public static function kode($kondisi = 'baik')
    {
        $query = StockAwal::query()
            ->where('active_cash', session('ClosedCash'))
            ->where('kondisi', $kondisi)
            ->latest('kode');

        $kodeKondisi = ($kondisi == 'baik') ? 'SA' : 'SAR';

        // check last num
        if ($query->doesntExist()){
            return "0001/{$kodeKondisi}/".date('Y');
        }

        $num = (int) $query->first()->last_num_trans + 1;
        return sprintf("%04s", $num)."/{$kodeKondisi}/".date('Y');
    }

    public static function store(PersediaanAwal $persediaanAwal)
    {
        $data['kode'] = self::kode();
        $stockAwal = $persediaanAwal->stockAwal()->create([
            'active_cash' => $persediaanAwal->active_cash,
            'kode' => self::kode(),
            'kondisi' => $persediaanAwal->kondisi,
            'gudang_id' => $persediaanAwal->gudang_id,
            'user_id' => $persediaanAwal->user_id,
            'total_barang' => $persediaanAwal->total_barang,
            'keterangan' => $persediaanAwal->keterangan
        ]);
        foreach ($persediaanAwal->persediaanAwalDetail as $item) {
            $stock = StockRepository::build($stockAwal->active_cash, $persediaanAwal->kondisi, $stockAwal->gudang_id, 'stock_awal', $item)->addStockIn();
            $stockAwal->stockAwalDetail()->create([
                'stock_id' => $stock->id,
                'jumlah' => $item->jumlah,
            ]);
        }
        return $stockAwal;
    }

    public static function update(PersediaanAwal $persediaanAwal)
    {
        $stockAwal = $persediaanAwal->stockAwal();
        $stockAwal->update([
            'kondisi' => $persediaanAwal->kondisi,
            'gudang_id' => $persediaanAwal->gudang_id,
            'user_id' => $persediaanAwal->user_id,
            'total_barang' => $persediaanAwal->total_barang,
            'keterangan' => $persediaanAwal->keterangan
        ]);
        $stockAwal = $persediaanAwal->stockAwal;
        foreach ($persediaanAwal->persediaanAwalDetail as $item) {
            $stock = StockRepository::build($persediaanAwal->active_cash, $persediaanAwal->kondisi, $persediaanAwal->gudang_id, 'stock_awal', $item)->addStockIn();
            $stockAwal->stockAwalDetail()->create([
                'stock_id' => $stock->id,
                'jumlah' => $item->jumlah,
            ]);
        }
        return $stockAwal;
    }

    public static function destroyDetail(PersediaanAwal $persediaanAwal)
    {
        $stockAwal = StockAwal::where('persediaan_awal_id', $persediaanAwal->id)->first();
        foreach ($stockAwal->stockAwalDetail as $row){
            StockRepository::build($stockAwal->active_cash, $stockAwal->kondisi, $stockAwal->gudang_id, 'stock_awal', $row)->rollbackStockIn();
        }
        return $stockAwal->stockAwalDetail()->delete();
    }

    public static function destroy(PersediaanAwal $persediaanAwal)
    {
        $stockAwal = $persediaanAwal->stockAwal;
        foreach ($stockAwal->stockAwalDetail as $row){
            StockRepository::build($persediaanAwal->active_cash, $persediaanAwal->gudang_id, 'stock_awal', $row)->rollbackStockIn();
        }
        $stockAwal->stockAwalDetail()->delete();
        return $stockAwal->delete();
    }
}
