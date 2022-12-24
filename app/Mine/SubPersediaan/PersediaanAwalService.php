<?php namespace App\Mine\SubPersediaan;

use App\Mine\SubStock\StockAwalRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PersediaanAwalService
{
    public function handleStore($data)
    {
        \DB::beginTransaction();
        try {
            $persediaanAwal = PersediaanAwalRepository::store($data);
            StockAwalRepository::store($persediaanAwal);
            \DB::commit();
            // status
        } catch (ModelNotFoundException $e){
            \DB::rollBack();
            // status
        }
    }

    public function handleEdit($id)
    {
        return PersediaanAwalRepository::getById($id);
    }

    public function handleUpdate($data)
    {
        \DB::beginTransaction();
        try {
            $persediaanAwal = PersediaanAwalRepository::update($data, $data['persediaan_awal_id']);
            StockAwalRepository::update($persediaanAwal);
            \DB::commit();
        } catch (ModelNotFoundException $e){
            \DB::rollBack();
        }
    }
}
