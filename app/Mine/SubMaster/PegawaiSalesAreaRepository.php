<?php namespace App\Mine\SubMaster;

use App\Models\Master\PegawaiSalesArea;

class PegawaiSalesAreaRepository implements MasterRepositoryInterface
{

    public static function getById($id)
    {
        return PegawaiSalesArea::find($id);
    }

    public static function datatables($deleted = false)
    {
        return PegawaiSalesArea::query();
    }

    public static function kode()
    {
        // generate kode
        $query = PegawaiSalesArea::latest('kode')->first();
        if (!$query){
            $num = 1;
        } else {
            $lastNum = (int) $query->last_num_master;
            $num = $lastNum + 1;
        }
        return "A".sprintf("%05s", $num);
    }

    public static function store(array $data)
    {
        $data['kode'] = self::kode();
        $builder = PegawaiSalesArea::create($data);
        // store detail
        $builder->pegawaiSalesAreaDetail()->createMany($data['dataDetail']);
        return $builder;
    }

    public static function update(array $data, $id)
    {
        $builder = PegawaiSalesArea::find($id);
        // update
        $builder->update($data);
        // store detail
        $builder->pegawaiSalesAreaDetail()->createMany($data['dataDetail']);
        return $builder;
    }

    public static function destroy($id)
    {
        $builder = PegawaiSalesArea::find($id);
        $builder->pegawaiSalesAreaDetail()->delete();
        return $builder->delete();
    }

    public static function unDestroy($id)
    {
        // TODO: Implement unDestroy() method.
    }

    public static function forceDestroy($id)
    {
        // TODO: Implement forceDestroy() method.
    }
}
