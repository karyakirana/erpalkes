<?php namespace App\Mine\SubMaster;

use App\Models\Master\Gudang;

class GudangRepository implements MasterRepositoryInterface
{
    public static function getById($id)
    {
        return Gudang::find($id);
    }

    public static function datatables($deleted = false)
    {
        return Gudang::query();
    }

    public static function kode()
    {
        // generate kode
        $builder = Gudang::latest('kode')->first();
        if (!$builder){
            $num = 1;
        } else {
            $lastNum = (int) $builder->last_num_master;
            $num = $lastNum + 1;
        }
        return "G".sprintf("%05s", $num);
    }

    public static function store(array $data)
    {
        $data['kode'] = self::kode();
        return Gudang::create($data);
    }

    public static function update(array $data, $id)
    {
        return Gudang::find($id)->update($data);
    }

    public static function destroy($id)
    {
        return Gudang::destroy($id);
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
