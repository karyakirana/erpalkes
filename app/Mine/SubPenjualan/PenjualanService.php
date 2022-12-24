<?php namespace App\Mine\SubPenjualan;

use App\Mine\SubStock\StockKeluarPenjualan;
use App\Mine\TransactionInterface;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PenjualanService implements TransactionInterface
{
    //
    public function handleForDatatables()
    {
        // TODO: Implement handleForDatatables() method.
    }

    public function handleById($id)
    {
        return PenjualanRepository::getById($id);
    }

    public function handleStore(array $data)
    {
        \DB::beginTransaction();
        try {
            $penjualan = PenjualanRepository::store($data);
            StockKeluarPenjualan::storeFromPenjualan($penjualan, $data);
            \DB::commit();
        } catch (ModelNotFoundException $e){
            \DB::rollBack();
        }
    }

    public function handleUpdate(array $data)
    {
        \DB::beginTransaction();
        try {
            $penjualan = PenjualanRepository::update($data);
            StockKeluarPenjualan::updateFromPenjualan($penjualan, $data);
            \DB::commit();
        } catch (ModelNotFoundException $e){
            \DB::rollBack();
        }
    }

    public function handleSoftDelete($id)
    {
        // TODO: Implement handleSoftDelete() method.
    }

    public function handleRestoreSoftDelete($id)
    {
        // TODO: Implement handleRestoreSoftDelete() method.
    }

    public function handleHardDelete($id)
    {
        // TODO: Implement handleHardDelete() method.
    }
}
