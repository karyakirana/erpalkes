<?php namespace App\Mine\SubPembelian;

use Illuminate\Database\Eloquent\ModelNotFoundException;

class PembelianPreorderService
{
    public function handleStore($data)
    {
        \DB::beginTransaction();
        try {
            $pembelianPreorder = PembelianPreorderRepository::store($data);
            \DB::commit();
        } catch (ModelNotFoundException $e){
            \DB::rollBack();
        }
    }

    public function handleEdit($pembelian_preorder_id)
    {
        return PembelianPreorderRepository::getById($pembelian_preorder_id);
    }

    public function handleUpdate($data)
    {
        \DB::beginTransaction();
        try {
            $pembelianPreorder = PembelianPreorderRepository::update($data);
            \DB::commit();
        } catch (ModelNotFoundException $e){
            \DB::rollBack();
        }
    }

    public function rollback($pembelian_predorder_id)
    {
        //
    }
}
