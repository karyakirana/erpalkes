<?php namespace App\Mine\SubStock;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class StockKeluarService
{
    public function handlegetData($stock_keluar_id)
    {
        return StockKeluarRepository::getById($stock_keluar_id);
    }

    public function handleStore(array $data)
    {
        \DB::beginTransaction();
        try {
            $stockKeluar = StockKeluarRepository::store($data);
            \DB::commit();
        } catch (ModelNotFoundException $e){
            \DB::rollBack();
        }
    }

    public function handleUpdate(array $data)
    {
        \DB::beginTransaction();
        try {
            // rollback first
            StockKeluarRepository::destroyDetail($data['stock_keluar_id']);
            $stockKeluar = StockKeluarRepository::update($data);
            \DB::commit();
        } catch (ModelNotFoundException $e){
            \DB::rollBack();
        }
    }

    public function handleDestroy($stock_keluar_id)
    {
        \DB::beginTransaction();
        try {
            StockKeluarRepository::destroy($stock_keluar_id);
            \DB::commit();
        } catch (ModelNotFoundException $e){
            \DB::rollBack();
        }
    }
}
