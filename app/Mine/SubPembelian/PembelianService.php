<?php namespace App\Mine\SubPembelian;

use App\Mine\SubPersediaan\PersediaanMasukRepository;
use App\Mine\SubStock\StockMasukPembelian;
use App\Mine\SubStock\StockMasukRepository;
use App\Mine\TransactionInterface;
use App\Models\Pembelian\Pembelian;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class PembelianService implements TransactionInterface
{

    public function handleForDatatables()
    {
        // TODO: Implement handleForDatatables() method.
    }

    public function handleById($id)
    {
        return PembelianRepository::getById($id);
    }

    public function handleLoadPembelianPreorder($pembelian_preorder_id)
    {
        return PembelianPreorderRepository::getById($pembelian_preorder_id);
    }

    public function handleStore(array $data)
    {
        \DB::beginTransaction();
        try {
            $pembelian = PembelianRepository::store($data);
            StockMasukPembelian::storeFromPembelian($pembelian, $data);
            PersediaanMasukRepository::store($pembelian->id, $pembelian::class,$data);
            \DB::commit();
        } catch (ModelNotFoundException $e){
            \DB::rollBack();
        }
    }

    public function handleUpdate(array $data)
    {
        \DB::beginTransaction();
        try {
            $pembelian = PembelianRepository::getById($data['persediaan_masuk_id']);
            $this->rollback($pembelian);
            $pembelian = PembelianRepository::update($data);
            StockMasukPembelian::updateFromPembelian($pembelian, $data);
            PersediaanMasukRepository::update($data);
            \DB::commit();
        } catch (ModelNotFoundException $e){
            \DB::rollBack();
        }
    }

    public function rollback(Pembelian $pembelian)
    {
        PembelianRepository::deleteDetail($pembelian->id);
        StockMasukRepository::destroyDetail($pembelian);
        PersediaanMasukRepository::destroyDetail($pembelian->id, $pembelian::class);
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
