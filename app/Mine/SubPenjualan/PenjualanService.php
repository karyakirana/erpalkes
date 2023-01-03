<?php namespace App\Mine\SubPenjualan;

use App\Mine\SubPersediaan\PersediaanKeluarRepository;
use App\Mine\SubStock\StockKeluarPenjualan;
use App\Mine\TransactionInterface;
use App\Models\Penjualan\Penjualan;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PenjualanService implements TransactionInterface
{
    //
    public function handleForDatatables()
    {
        return PenjualanRepository::getAllCurrentActiveCash();
    }

    public function handleById($id)
    {
        return PenjualanRepository::getById($id);
    }

    public function handleLoadFromPreorder($penjualan_preorder_id)
    {
        return PenjualanPreorderRepository::getById($penjualan_preorder_id);
    }

    public function handleStore(array $data)
    {
        \DB::beginTransaction();
        try {
            $penjualan = PenjualanRepository::store($data);
            StockKeluarPenjualan::storeFromPenjualan($penjualan, $data);
            PersediaanKeluarRepository::storeFromPenjualan($penjualan, $data);
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

    public function handleUpdate(array $data)
    {
        \DB::beginTransaction();
        try {
            $penjualan = PenjualanRepository::getById($data['penjualan_id']);
            $this->rollback($penjualan);
            $penjualan = PenjualanRepository::update($data);
            StockKeluarPenjualan::updateFromPenjualan($penjualan, $data);
            PersediaanKeluarRepository::updateFromPenjualan($penjualan, $data);
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

    protected function rollback(Penjualan $penjualan)
    {
        PenjualanRepository::deleteDetail($penjualan->id);
        StockKeluarPenjualan::destroyDetailFromPenjualan($penjualan);
        PersediaanKeluarRepository::destroyDetailFromPenjualan($penjualan);
        // todo jurnal rollback
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
