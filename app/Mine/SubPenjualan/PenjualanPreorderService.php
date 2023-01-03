<?php namespace App\Mine\SubPembelian;

use App\Mine\SubPenjualan\PenjualanPreorderRepository;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PenjualanPreorderService
{
    public function handleStore($data)
    {
        \DB::beginTransaction();
        try{
            $penjualanPreorder = PenjualanPreorderRepository::store($data);
            \DB::commit();
        }catch (ModelNotFoundException $e){
            \DB::rollback();
        }
    }

    public function handleEdit($penjualan_preorder_id)
    {
        return PenjualanPreorderRepository::getById($penjualan_preorder_id);
    }

    public function handleUpdate($data)
    {
        \DB::beginTransaction();
        try {
            $penjualanPreorder = PenjualanPreorderRepository::update($data);
            \DB::commit();
        }catch (ModelNotFoundException $e){
            \DB::rollBack();
        }
    }

    public function rollback($penjualan_preorder_id)
    {
        //
    }
}
