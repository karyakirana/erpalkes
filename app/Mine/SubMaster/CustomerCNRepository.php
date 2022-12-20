<?php namespace App\Mine\SubMaster;

use App\Models\Master\CustomerCN;

class CustomerCNRepository implements MasterRepositoryInterface
{

    public static function getById($id)
    {
        return CustomerCN::find($id);
    }

    public static function datatables($deleted = false)
    {
        return CustomerCN::query();
    }

    public static function kode()
    {
        // generate kode
        $builder = CustomerCN::latest('kode')->first();
        if (!$builder){
            $num = 1;
        } else {
            $lastNum = (int) $builder->last_num2_master;
            $num = $lastNum + 1;
        }
        return "CN".sprintf("%05s", $num);
    }

    public static function store(array $data)
    {
        $data['kode'] = self::kode();
        return CustomerCN::create($data);
    }

    public static function update(array $data, $id)
    {
        return CustomerCN::find($id)->update($data);
    }

    public static function destroy($id)
    {
        return CustomerCN::destroy($id);
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
