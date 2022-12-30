<?php namespace App\Mine\SubPersediaan;

use App\Models\Persediaan\PersediaanAwal;

class PersediaanAwalRepository
{
    public static function getById($perdesiaan_awal_id)
    {
        return PersediaanAwal::find($perdesiaan_awal_id);
    }

    public static function datatables($deleted = false)
    {
        $query = PersediaanAwal::query();
        if ($deleted){
            $query = $query->withTrashed();
        }
        return $query;
    }

    public static function kode($kondisi = 'baik')
    {
        $query = PersediaanAwal::query()
            ->where('active_cash', session('ClosedCash'))
            ->where('kondisi', $kondisi)
            ->latest('kode');

        $kodeKondisi = ($kondisi == 'baik') ? 'PA' : 'PAR';

        // check last num
        if ($query->doesntExist()){
            return "0001/{$kodeKondisi}/".date('Y');
        }

        $num = (int) $query->first()->last_num_trans + 1;
        return sprintf("%04s", $num)."/{$kodeKondisi}/".date('Y');
    }

    public static function store(array $data)
    {
        $data['kode'] = self::kode();
        $data['active_cash'] = session('ClosedCash');
        $query = PersediaanAwal::create($data);
        return self::storeDetail($data, $query);
    }

    public static function update(array $data, $persediaan_awal_id)
    {
        $query = self::getById($persediaan_awal_id);
        $query->update($data);
        return self::storeDetail($data, $query);
    }

    public static function destroyDetail($persediaan_awal_id)
    {
        $query = self::getById($persediaan_awal_id);
        foreach ($query->persediaanAwalDetail as $row) {
            // rollback persediaan
            PersediaanRepository::rollbackStaticPersediaanIn($row->persediaan_id, $row->jumlah, 'stock_masuk');
        }
        return $query->persediaanAwalDetail()->delete();
    }

    public static function destroy($persediaan_awal_id)
    {
        $query = self::getById($persediaan_awal_id);
        foreach ($query->persediaanAwalDetail as $row) {
            // rollback persediaan
            PersediaanRepository::rollbackStaticPersediaanIn($row->persediaan_id, $row->jumlah, 'stock_masuk');
        }
        $query->persediaanAwalDetail()->delete();
        return $query->delete();
    }

    /**
     * @param array $data
     * @param \LaravelIdea\Helper\App\Models\Persediaan\_IH_PersediaanAwal_C|PersediaanAwal|array|null $query
     * @return PersediaanAwal|array|\LaravelIdea\Helper\App\Models\Persediaan\_IH_PersediaanAwal_C|null
     */
    public static function storeDetail(array $data, \LaravelIdea\Helper\App\Models\Persediaan\_IH_PersediaanAwal_C|PersediaanAwal|array|null $query): array|null|PersediaanAwal|\LaravelIdea\Helper\App\Models\Persediaan\_IH_PersediaanAwal_C
    {
        foreach ($data['dataDetail'] as $row) {
            // add persediaan
            $persediaan = PersediaanRepository::build($query->active_cash, $data['kondisi'], $query->gudang_id, 'stock_awal', $row)
                ->addPersedianIn();
            $query->persediaanAwalDetail()->create([
                'persediaan_id' => $persediaan->id,
                'harga' => $row['harga'],
                'jumlah' => $row['jumlah'],
                'sub_total' => $row['sub_total']
            ]);
        }
        return $query;
    }
}
