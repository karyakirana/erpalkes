<?php namespace App\Mine\SubMaster;

use App\Models\Master\Pegawai;

class PegawaiRepository implements MasterRepositoryInterface
{
    public static function getById($id)
    {
        return Pegawai::find($id);
    }

    public static function datatables($deleted = false)
    {
        $query = Pegawai::query();
        if ($deleted) {
            // with deleted account
            $query = $query->withTrashed();
        }
        // without deletec account
        return $query;
    }

    public static function kode()
    {
        // generate kode
        $query = Pegawai::latest('kode')->first();
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
        return Pegawai::create($data);
    }

    public static function update(array $data, $id)
    {
        $builder = Pegawai::find($id);
        return $builder->update($data);
    }

    public static function destroy($id)
    {
        return Pegawai::destroy($id);
    }

    public static function unDestroy($id)
    {
        return Pegawai::find($id)->restore();
    }

    public static function forceDestroy($id)
    {
        return Pegawai::find($id)->forceDelete();
    }
}
