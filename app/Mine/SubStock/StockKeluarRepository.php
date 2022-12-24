<?php namespace App\Mine\SubStock;

use App\Models\Stock\StockKeluar;

class StockKeluarRepository
{
    public static function getById($stock_keluar_id)
    {
        return StockKeluar::find($stock_keluar_id);
    }

    public static function getByMorph($stockableKeluarId, $stockableKeluarType)
    {
        return StockKeluar::where('stockable_keluar_id', $stockableKeluarId)
            ->where('stockable_keluar_type', $stockableKeluarType)
            ->first();
    }

    public static function getAllCurrentActiveCash($deleted = false)
    {
        if ($deleted){
            return StockKeluar::withTrashed()
                ->where('active_cash', session('ClosedCash'))
                ->latest()
                ->get();
        }
        return StockKeluar::where('active_cash', session('ClosedCash'))
            ->latest()->get();
    }

    public static function getAllByActiveCash()
    {
        return StockKeluar::latest()->get();
    }

    public static function kode($kondisi = 'baik')
    {
        $query = StockKeluar::query()
            ->where('active_cash', session('ClosedCash'))
            ->where('kondisi', $kondisi)
            ->latest('kode');

        $kodeKondisi = ($kondisi == 'baik') ? 'SK' : 'SKR';

        // check last num
        if ($query->doesntExist()){
            return "0001/{$kodeKondisi}/".date('Y');
        }

        $num = (int) $query->first()->last_num_trans + 1;
        return sprintf("%04s", $num)."/{$kodeKondisi}/".date('Y');
    }

    public static function store(array $data)
    {
        $active_cash = session('ClosedCash');
        $data['active_cash'] = $active_cash;
        $data['kode'] = self::kode($data['kondisi']);
        $stockKeluar = StockKeluar::create($data);
        foreach ($data['dataDetail'] as $row) {
            StockRepository::build(
                $stockKeluar->active_cash,
                $stockKeluar->kondisi,
                $stockKeluar->gudang_id,
                'stock_keluar',
                $row
            )->addStockOut();
        }
        $stockKeluar->stockKeluarDetail()->createMany($data['dataDetail']);
        return $stockKeluar;
    }

    public static function update(array $data)
    {
        $stockKeluar = StockKeluar::find($data['stock_keluar_id']);
        $stockKeluar->update($data);
        $stockKeluar = $stockKeluar->refresh();
        foreach ($data['dataDetail'] as $row) {
            StockRepository::build(
                $stockKeluar->active_cash,
                $stockKeluar->kondisi,
                $stockKeluar->gudang_id,
                'stock_keluar',
                $row
            )->addStockOut();
        }
        $stockKeluar->stockKeluarDetail()->createMany($data['dataDetail']);
        return $stockKeluar;
    }

    public static function destroyDetail($stock_keluar_id)
    {
        $stockKeluar = StockKeluar::find($stock_keluar_id);
        foreach ($stockKeluar->stockKeluarDetail as $row) {
            StockRepository::build(
                $stockKeluar->active_cash,
                $stockKeluar->kondisi,
                $stockKeluar->gudang_id,
                'stock_keluar',
                $row
            )->rollbackStockOut();
        }
        return $stockKeluar->stockKeluarDetail()->delete();
    }

    public static function destroy($stock_keluar_id)
    {
        $stockKeluar = StockKeluar::find($stock_keluar_id);
        foreach ($stockKeluar->stockKeluarDetail as $row) {
            StockRepository::build(
                $stockKeluar->active_cash,
                $stockKeluar->kondisi,
                $stockKeluar->gudang_id,
                'stock_keluar',
                $row
            )->rollbackStockOut();
        }
        $stockKeluar->stockKeluarDetail()->delete();
        return $stockKeluar->delete();
    }
}
