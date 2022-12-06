<?php namespace App\Mine\SubMaster;

use App\Models\Master\ProdukKategori;

class ProdukKategoriRepository implements MasterRepositoryInterface
{

    public static function getById($id)
    {
        return ProdukKategori::find($id);
    }

    public static function datatables($deleted = false)
    {
        $query = ProdukKategori::query();
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
        $builder = ProdukKategori::latest('kode')->first();
        if (!$builder){
            $num = 1;
        } else {
            $lastNum = (int) $builder->last_num_master;
            $num = $lastNum + 1;
        }
        return "K".sprintf("%05s", $num);
    }

    public static function store(array $data)
    {
        $data['active_cash'] = session('ClosedCash');
        $data['kode'] = self::kode();
        return ProdukKategori::create($data);
    }

    public static function update(array $data, $id)
    {
        $builder = ProdukKategori::find($id);
        return $builder->update($data);
    }

    public static function destroy($id)
    {
        return ProdukKategori::destroy($id);
    }

    public static function unDestroy($id)
    {
        return ProdukKategori::find($id)->restore();
    }

    public static function forceDestroy($id)
    {
        return ProdukKategori::find($id)->forceDelete();
    }
}
