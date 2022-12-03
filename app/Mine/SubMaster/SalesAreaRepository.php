<?php namespace App\Mine\SubMaster;

use App\Models\Master\SalesArea;

class SalesAreaRepository
{
    public static function getById($salesAreaId)
    {
        return SalesArea::find($salesAreaId);
    }

    public static function getAll()
    {
        return SalesArea::all();
    }

    public static function kode()
    {
        $area = SalesArea::latest('kode_area')->first();
        if ($area == null){
            $num = 1;
        } else {
            $lastNum = (int) $area->last_num_master;
            $num = $lastNum + 1;
        }
        return "A".sprintf("%05s", $num);
    }

    public static function store(array $data)
    {
        $data['kode_area'] = self::kode();
        $salesArea = SalesArea::create($data);
        $salesArea->salesAreaDetail()->createMany($data['dataDetail']);
        return $salesArea;
    }

    public static function update(array $data)
    {
        $salesArea = SalesArea::find($data['area_id']);
        $salesArea->update($data);
        $salesArea->salesAreaDetail()->createMany($data['dataDetail']);
    }

    public static function deleteDetaail($salesAreaId)
    {
        $salesArea = SalesArea::find($salesAreaId);
        return $salesArea->salesAreaDetail()->delete();
    }

    public static function destroy($salesAreaId)
    {
        $salesArea = SalesArea::find($salesAreaId);
        $salesArea->salesAreaDetail()->delete();
        return $salesArea->delete();
    }
}
