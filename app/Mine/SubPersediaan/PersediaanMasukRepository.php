<?php namespace App\Mine\SubPersediaan;

use App\Models\Persediaan\PersediaanMasuk;
use LaravelIdea\Helper\App\Models\Persediaan\_IH_PersediaanMasuk_C;

class PersediaanMasukRepository
{
    public static function getDataById($id)
    {
        return PersediaanMasuk::find($id);
    }

    public static function datatables()
    {
        //
    }

    public static function kode($kondisi = 'baik')
    {
        $query = PersediaanMasuk::query()
            ->where('active_cash', session('ClosedCash'))
            ->where('kondisi', $kondisi)
            ->latest('kode');

        $kodeKondisi = ($kondisi == 'baik') ? 'PM' : 'PMR';

        // check last num
        if ($query->doesntExist()){
            return "0001/{$kodeKondisi}/".date('Y');
        }

        $num = (int) $query->first()->last_num_trans + 1;
        return sprintf("%04s", $num)."/{$kodeKondisi}/".date('Y');
    }

    public static function store($classId, $classType, array $data)
    {
        $persediaanMasuk = PersediaanMasuk::create([
            'persedianable_masuk_id' => $classId,
            'persediaanable_masuk_type' => $classType,
            'active_cash' => session('ClosedCash'),
            'kode' => self::kode($data['kondisi']),
            'kondisi' => $data['kondisi'],
            'gudang_id' => $data['gudang_id'],
            'user_id' => \Auth::id(),
            'total_barang' => $data['total_barang'],
            'total_nominal' => $data['total_nominal'],
            'keterangan' => $data['keterangan']
        ]);
        return self::storeDetail($data['dataDetail'], $persediaanMasuk);
    }

    public static function update(array $data)
    {
        $persediaanMasuk = self::getDataById($data['persediaan_masuk_id']);
        $persediaanMasuk->update([
            'kondisi' => $data['kondisi'],
            'gudang_id' => $data['gudang_id'],
            'user_id' => \Auth::id(),
            'total_barang' => $data['total_barang'],
            'total_nominal' => $data['total_nominal'],
            'keterangan' => $data['keterangan']
        ]);
        return self::storeDetail($data['dataDetail'], $persediaanMasuk);
    }

    /**
     * @param $dataDetail
     * @param array|PersediaanMasuk|_IH_PersediaanMasuk_C|null $persediaanMasuk
     * @return PersediaanMasuk
     */
    protected static function storeDetail($dataDetail, array|PersediaanMasuk|\LaravelIdea\Helper\App\Models\Persediaan\_IH_PersediaanMasuk_C|null $persediaanMasuk): PersediaanMasuk
    {
        foreach ($dataDetail as $item) {
            // persediaan masuk
            $persediaan = PersediaanRepository::build(
                $persediaanMasuk->active_cash,
                $persediaanMasuk->kondisi,
                $persediaanMasuk->gudang_id,
                'stock_masuk',
                $item
            )->addPersedianIn();
            $persediaanMasuk->persediaanMasukDetail()->create([
                'persediaan_id' => $persediaan->id,
                'jumlah' => $item['jumlah'],
                'harga' => $persediaan->harga,
                'sub_total' => $item['jumlah'] * $persediaan->harga
            ]);
        }
        return $persediaanMasuk->refresh();
    }

    public static function destroyDetail($class_id, $class_type)
    {
        $persediaanMasuk = PersediaanMasuk::where('persedianable_masuk_id', $class_id)
            ->where('persediaanable_masuk_type', $class_type)
            ->where('persediaanable_masuk_type', $class_type)->first();
        foreach ($persediaanMasuk->persediaanMasukDetail as $row){
            PersediaanRepository::build(
                $persediaanMasuk->active_cash,
                $persediaanMasuk->kondisi,
                $persediaanMasuk->gudang_id,
                'stock_masuk',
                $row
            )->addPersedianIn();
        }
        return $persediaanMasuk->persediaanMasukDetail()->delete();
    }

    public static function destroy(PersediaanMasuk $persediaanMasuk)
    {
        self::destroyDetail($persediaanMasuk);
        return $persediaanMasuk->delete();
    }
}
