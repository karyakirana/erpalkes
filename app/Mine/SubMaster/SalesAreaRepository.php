<?php namespace App\Mine\SubMaster;

use App\Models\Master\SalesArea;

class SalesAreaRepository implements MasterRepositoryInterface
{
    public static function getById($id)
    {
        return SalesArea::find($id);
    }

    public static function datatables($deleted = false)
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

    public static function update(array $data, $id)
    {
        $salesArea = SalesArea::find($id);
        $salesArea->update($data);
        $salesArea->salesAreaDetail()->createMany($data['dataDetail']);
    }

    public static function deleteDetail($id)
    {
        $salesArea = SalesArea::find($id);
        return $salesArea->salesAreaDetail()->delete();
    }

    public static function destroy($id)
    {
        $salesArea = SalesArea::find($id);
        $salesArea->salesAreaDetail()->delete();
        return $salesArea->delete();
    }
}
