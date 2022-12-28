<?php namespace App\Mine\SubPersediaan;

use App\Mine\SubStock\StockMasukRepository;
use App\Models\Persediaan\PersediaanMasuk;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PersediaanMasukService
{
    public function handleStore($data)
    {
        \DB::beginTransaction();
        try {
            $persediaanMasuk = PersediaanMasukRepository::store($data);
            StockMasukRepository::store($persediaanMasuk);
            $persediaanMasuk = PersediaanMasukRepository::store($data);
            // todo jurnal
            \DB::commit();
            // return status true
        }catch (ModelNotFoundException $e){
            \DB::rollBack();
            // return status false and exception message
        }
    }

    public function handleEdit($id)
    {
        return PersediaanMasukRepository::getDataById($id);
    }

    public function handleUpdate($data)
    {
        \DB::beginTransaction();
        try {
            $persediaanMasuk = PersediaanMasukRepository::getDataById($data['persediaan_masuk_id']);
            $this->rollback($persediaanMasuk);
            $persediaanMasuk = PersediaanMasukRepository::update($data, $data['persediaan_masuk_id']);
            StockMasukRepository::update($persediaanMasuk);
            // todo jurnal
            \DB::commit();
            // return status true
        } catch (ModelNotFoundException $e) {
            \DB::rollBack();
            // return status false and exception message
        }
    }

    public function rollback(PersediaanMasuk $persediaanMasuk)
    {
        PersediaanMasukRepository::destroyDetail($persediaanMasuk->id);
        StockMasukRepository::destroyDetail($persediaanMasuk);
    }
}
