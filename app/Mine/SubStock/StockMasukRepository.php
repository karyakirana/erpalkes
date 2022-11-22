<?php namespace App\Mine\SubStock;

use App\Models\Stock\StockMasuk;

class StockMasukRepository
{
    public static function getByMorph($stockableId, $stockableType)
    {
        return StockMasuk::where('stockable_masuk_id', $stockableId)
            ->where('stockable_masuk_type', $stockableType)
            ->first();
    }

    public static function getAllCurrentActiveCash($deleted = false)
    {
        if ($deleted){
            return StockMasuk::withTrashed()
                ->where('active_cash', session('ClosedCash'))
                ->latest()
                ->get();
        }
        return StockMasuk::where('active_cash', session('ClosedCash'))
            ->latest()->get();
    }

    public static function getAllByActiveCash()
    {
        return StockMasuk::latest()->get();
    }

    public static function kode()
    {
        return null;
    }
}
