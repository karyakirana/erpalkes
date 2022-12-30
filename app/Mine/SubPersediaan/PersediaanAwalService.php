<?php namespace App\Mine\SubPersediaan;

use App\Mine\SubStock\StockAwalRepository;
use App\Models\Persediaan\PersediaanAwal;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PersediaanAwalService
{
    public function handleStore($data)
    {
        \DB::beginTransaction();
        try {
            $persediaanAwal = PersediaanAwalRepository::store($data);
            StockAwalRepository::store($persediaanAwal);
            // todo jurnal
            \DB::commit();
            // return status true
            return (object)[
                'status' => true,
                'messages' => 'Data Berhasil Disimpan'
            ];
        } catch (ModelNotFoundException $e){
            \DB::rollBack();
            // return status false and exception message
            return (object)[
                'status' => false,
                'messages' => $e
            ];
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
            $persediaanAwal = PersediaanAwalRepository::getById($data['persediaan_awal_id']);
            $this->rollback($persediaanAwal);
            $persediaanAwal = PersediaanAwalRepository::update($data, $data['persediaan_awal_id']);
            StockAwalRepository::update($persediaanAwal);
            // todo jurnal
            \DB::commit();
            // return status true
        } catch (ModelNotFoundException $e){
            \DB::rollBack();
            // return status false and exception message
        }
    }

    public function rollback(PersediaanAwal $persediaanAwal)
    {
        PersediaanAwalRepository::destroyDetail($persediaanAwal->id);
        StockAwalRepository::destroyDetail($persediaanAwal);
    }
}
