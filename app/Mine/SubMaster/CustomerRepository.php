<?php namespace App\Mine\SubMaster;

use App\Models\Master\Customer;

class CustomerRepository implements MasterRepositoryInterface
{
    public static function getById($id)
    {
        return Customer::find($id);
    }

    public static function datatables($deleted = false)
    {
        $query = Customer::query();
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
        $customer = Customer::latest('kode')->first();
        if (!$customer){
            $num = 1;
        } else {
            $lastNum = (int) $customer->last_num_master;
            $num = $lastNum + 1;
        }
        return "C".sprintf("%05s", $num);
    }

    public static function store(array $data)
    {
        $data['active_cash'] = session('ClosedCash');
        $data['kode'] = self::kode();
        return Customer::create($data);
    }

    public static function update(array $data, $id)
    {
        $builder = Customer::find($id);
        return $builder->update($data);
    }

    public static function destroy($id)
    {
        return Customer::destroy($id);
    }

    public static function unDestroy($id)
    {
        return Customer::find($id)->restore();
    }

    public static function forceDestroy($id)
    {
        return Customer::find($id)->forceDelete();
    }
}
