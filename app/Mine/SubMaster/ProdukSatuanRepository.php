<?php namespace App\Mine\SubMaster;

use App\Models\Master\Satuan;

class ProdukSatuanRepository implements MasterRepositoryInterface
{

    public static function getById($id)
    {
        return Satuan::find($id);
    }

    public static function datatables($deleted = false)
    {
        return Satuan::query();
    }

    public static function kode()
    {
        return null;
    }

    public static function store(array $data)
    {
        return Satuan::create($data);
    }

    public static function update(array $data, $id)
    {
        return Satuan::find($id)->update($data);
    }

    public static function destroy($id)
    {
        return Satuan::destroy($id);
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
