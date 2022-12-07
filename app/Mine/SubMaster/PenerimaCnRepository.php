<?php namespace App\Mine\SubMaster;

use App\Models\master\PenerimaCN;

class PenerimaCnRepository implements MasterRepositoryInterface
{
    public static function getById($id)
    {
        return PenerimaCN::find($id);
    }

    public static function datatables($deleted = false)
    {
        $query = PenerimaCN::query();
        if ($deleted) {
            // with deleted account
            $query = $query->withTrashed();
        }
        // without deletec account
        return $query->latest('kode')->get();
    }

    public static function kode()
    {
        // generate kode
        $query = PenerimaCN::latest('kode')->first();
        if (!$query){
            $num = 1;
        } else {
            $lastNum = (int) $query->last_num_master;
            $num = $lastNum + 1;
        }
        return "E".sprintf("%05s", $num);
    }

    public static function store(array $data)
    {
        $data['active_cash'] = session('ClosedCash');
        $data['kode'] = self::kode();
        return PenerimaCN::create($data);
    }

    public static function update(array $data, $id)
    {
        $builder = PenerimaCN::find($id);
        return $builder->update($data);
    }

    public static function destroy($id)
    {
        return PenerimaCN::destroy($id);
    }

    public static function unDestroy($id)
    {
        return PenerimaCN::find($id)->restore();
    }

    public static function forceDestroy($id)
    {
        return PenerimaCN::find($id)->forceDelete();
    }
}
