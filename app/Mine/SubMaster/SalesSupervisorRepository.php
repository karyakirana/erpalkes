<?php namespace App\Mine\SubMaster;

use App\Models\Master\SalesSupervisor;
use App\Models\Master\SalesSupervisorDetail;

class SalesSupervisorRepository implements MasterRepositoryInterface
{
    public static function getById($id)
    {
        return SalesSupervisor::find($id);
    }

    public static function datatables($deleted = false)
    {
        $query = SalesSupervisor::query();
        if ($deleted) {
            // with deleted account
            $query = $query->withTrashed();
        }
        // without deletec account
        return $query->latest('kode');
    }

    public static function datatablesDetail()
    {
        return SalesSupervisorDetail::query();
    }

    public static function kode()
    {
        // generate kode
        $query = SalesSupervisor::latest('kode')->first();
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
        $query = SalesSupervisor::create($data);
        $query->salesSupervisorDetail()->createMany($data['dataDetail']);
        return $query;
    }

    public static function update(array $data, $id)
    {
        $builder = SalesSupervisor::find($id);
        $builder->update($data);
        $builder->salesSupervisorDetail()->delete(); // delete detail first
        $builder->salesSupervisorDetail()->createMany($data['dataDetail']); // insert detail after
        return $builder;
    }

    public static function destroy($id)
    {
        return SalesSupervisor::destroy($id);
    }

    public static function unDestroy($id)
    {
        return SalesSupervisor::find($id)->restore();
    }

    public static function forceDestroy($id)
    {
        return SalesSupervisor::find($id)->forceDelete();
    }
}
