<?php namespace App\Mine\SubPersediaan;

use App\Mine\SubStock\StockKeluarRepository;
use App\Models\Persediaan\PersediaanKeluar;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PersediaanKeluarService
{
    public function handleStore($data)
    {
        \DB::beginTransaction();
        try{
            $persediaanKeluar = PersediaanKeluarRepository::store($data);
            StockKeluarRepository::store($persediaanKeluar);
            $persediaanKeluar = PersediaanKeluarRepository::store($data);
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
        return PersediaanKeluarRepository::getDataById($id);
    }

    public function handleUpdate($data)
    {
        \DB::beginTransaction();
        try{
            $persediaanKeluar = PersediaanKeluarRepository::getDataById($data['persediaan_keluar_id']);
            $this->rollback($persediaanKeluar);
            $persediaanKeluar = PersediaanKeluarRepository::update($data, $data['persediaan_keluar_id']);
            StockKeluarRepository::update($persediaanKeluar);
            // todo jurnal
            \DB::commit();
            // return status true
        } catch (ModelNotFoundException $e) {
            \DB::rollBack();
            // return status false and exception message
        }
    }

    public function rollback(PersediaanKeluar $persediaanKeluar)
    {
        PersediaanKeluarRepository::destroyDetail($persediaanKeluar->id);
        StockKeluarRepository::destroyDetail($persediaanKeluar);
    }
}
