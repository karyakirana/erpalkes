<?php namespace App\Mine\SubAkuntansi;

use App\Mine\SubPenjualan\PenjualanRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PenerimaanPenjualanService
{
    public function handleStore($data)
    {
        \DB::beginTransaction();
        try {
            $penerimaan = PenerimaanPenjualanRepository::store($data);
            \DB::commit();
        } catch (ModelNotFoundException $e){
            \DB::rollBack();
        }
    }

    public function handleEdit($penerimaan_penjualan_id)
    {
        return PenerimaanPenjualanRepository::getById($penerimaan_penjualan_id);
    }

    public function handleUpdate($data)
    {
        \DB::beginTransaction();
        try {
            PenerimaanPenjualanRepository::deleteDetail($data['penerimaan_penjualan_id']);
            $penerimaan = PenerimaanPenjualanRepository::store($data);
            \DB::commit();
        } catch (ModelNotFoundException $e){
            \DB::rollBack();
        }
    }
}
