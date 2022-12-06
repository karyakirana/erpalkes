<?php namespace App\Mine\SubMaster;

use App\Models\Master\ProdukHarga;

class ProdukHargaRepository implements MasterRepositoryInterface
{
    public static function getById($id)
    {
        return ProdukHarga::find($id);
    }

    public static function datatables($deleted = false)
    {
        $query = ProdukHarga::query();
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
        $builder = ProdukHarga::latest('kode')->first();
        if (!$builder){
            $num = 1;
        } else {
            $lastNum = (int) $builder->last_num_master;
            $num = $lastNum + 1;
        }
        return "H".sprintf("%05s", $num);
    }

    public static function store(array $data)
    {
        $data['active_cash'] = session('ClosedCash');
        $data['kode'] = self::kode();
        return ProdukHarga::create($data);
    }

    public static function update(array $data, $id)
    {
        $builder = ProdukHarga::find($id);
        return $builder->update($data);
    }

    public static function destroy($id)
    {
        return ProdukHarga::destroy($id);
    }

    public static function unDestroy($id)
    {
        return ProdukHarga::find($id)->restore();
    }

    public static function forceDestroy($id)
    {
        return ProdukHarga::find($id)->forceDelete();
    }
}
