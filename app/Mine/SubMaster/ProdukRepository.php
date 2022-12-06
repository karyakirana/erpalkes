<?php namespace App\Mine\SubMaster;

use App\Models\Master\Produk;

class ProdukRepository implements MasterRepositoryInterface
{

    public static function getById($id)
    {
        return Produk::find($id);
    }

    public static function datatables($deleted = false)
    {
        $query = Produk::query();
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
        $builder = Produk::latest('kode')->first();
        if (!$builder){
            $num = 1;
        } else {
            $lastNum = (int) $builder->last_num_master;
            $num = $lastNum + 1;
        }
        return "P".sprintf("%05s", $num);
    }

    public static function store(array $data)
    {
        $data['active_cash'] = session('ClosedCash');
        $data['kode'] = self::kode();
        return Produk::create($data);
    }

    public static function update(array $data, $id)
    {
        $builder = Produk::find($id);
        return $builder->update($data);
    }

    public static function destroy($id)
    {
        return Produk::destroy($id);
    }

    public static function unDestroy($id)
    {
        return Produk::find($id)->restore();
    }

    public static function forceDestroy($id)
    {
        return Produk::find($id)->forceDelete();
    }
}
