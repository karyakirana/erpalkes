<?php namespace App\Mine\SubStock;

use App\Models\Stock\StockKeluar;

class StockKeluarRepository
{
    public static function getByMorph($stockableKeluarId, $stockableKeluarType)
    {
        return StockKeluar::where('stockable_keluar_id', $stockableKeluarId)
            ->where('stockable_keluar_type', $stockableKeluarType)
            ->latest()
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

    public static function kode()
    {
        return null;
    }
}
