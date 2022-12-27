<?php namespace App\Mine\SubStock;

use App\Models\Stock\StockMasuk;

class StockMasukRepository
{
    public static function getById($stock_masuk_id)
    {
        return StockMasuk::find($stock_masuk_id);
    }

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

    public static function kode($kondisi = 'baik')
    {
        $query = StockMasuk::query()
            ->where('active_cash', session('ClosedCash'))
            ->where('kondisi', $kondisi)
            ->latest('kode');

        $kodeKondisi = ($kondisi == 'baik') ? 'SM' : 'SMR';

        // check last num
        if ($query->doesntExist()){
            return "0001/{$kodeKondisi}/".date('Y');
        }

        $num = (int) $query->first()->last_num_trans + 1;
        return sprintf("%04s", $num)."/{$kodeKondisi}/".date('Y');
    }

    public static function store(array $data)
    {
        $data['active_cash'] = session('ClosedCash');
        $data['kode'] = self::kode($data['kondisi']);
        $stockMasuk = StockMasuk::create($data);
        foreach ($data['dataDetail'] as $row) {
            StockRepository::build(
                $stockMasuk->active_cash,
                $stockMasuk->kondisi,
                'stock_masuk',
                $row
            )->addStockIn();
        }
        $stockMasuk->stockMasukDetail()->createMany($data['dataDetail']);
        return $stockMasuk;
    }

    public static function update(array $data)
    {
        $stockMasuk = StockMasuk::find($data['stock_masuk_id']);
        $stockMasuk->update($data);
        $stockMasuk = $stockMasuk->refresh();
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

    public static function destroyDetail($stock_masuk_id)
    {
        $stockMasuk = StockMasuk::find($stock_masuk_id);
        foreach ($stockMasuk->stockMasukDetail as $item) {
            StockRepository::build(
                $stockMasuk->active_cash,
                $stockMasuk->kondisi,
                $stockMasuk->gudang_id,
                'stock_masuk',
                $item
            )->rollbackStockOut();
        }
        return $stockMasuk->stockMasukDetail()->delete();
    }

    public static function destroy($stock_masuk_id)
    {
        $stockMasuk = StockMasuk::find($stock_masuk_id);
        foreach ($stockMasuk->stockMasukDetail as $item) {
            StockRepository::build(
                $stockMasuk->active_cash,
                $stockMasuk->kondisi,
                $stockMasuk->gudang_id,
                'stock_masuk',
                $item
            )->rollbackStockOut();
        }
        $stockMasuk->stockMasukDetail()->delete();
        return $stockMasuk->delete();
    }
}
