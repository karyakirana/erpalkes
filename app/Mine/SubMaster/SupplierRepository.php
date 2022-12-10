<?php namespace App\Mine\SubMaster;

use App\Models\Master\Supplier;

class SupplierRepository implements MasterRepositoryInterface
{
    public static function getById($id)
    {
        return Supplier::find($id);
    }

    public static function datatables($deleted = false)
    {
        $query = Supplier::query();
        if ($deleted) {
            // with deleted account
            $query = $query->withTrashed();
        }
        // without deletec account
        return $query->latest('kode');
    }

    public static function kode()
    {
        // generate kode
        $query = Supplier::latest('kode')->first();
        if (!$query){
            $num = 1;
        } else {
            $lastNum = (int) $query->last_num_master;
            $num = $lastNum + 1;
        }
        return "S".sprintf("%05s", $num);
    }

    public static function store(array $data)
    {
        $data['active_cash'] = session('ClosedCash');
        $data['kode'] = self::kode();
        return Supplier::create($data);
    }

    public static function update(array $data, $id)
    {
        $builder = Supplier::find($id);
        return $builder->update($data);
    }

    public static function destroy($id)
    {
        return Supplier::destroy($id);
    }

    public static function unDestroy($id)
    {
        return Supplier::find($id)->restore();
    }

    public static function forceDestroy($id)
    {
        return Supplier::find($id)->forceDelete();
    }
}
