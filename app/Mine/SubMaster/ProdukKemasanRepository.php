<?php namespace App\Mine\SubMaster;

use App\Models\Master\Kemasan;

class ProdukKemasanRepository implements MasterRepositoryInterface
{

    public static function getById($id)
    {
        return Kemasan::find($id);
    }

    public static function datatables($deleted = false)
    {
        return Kemasan::query();
    }

    public static function kode()
    {
        return null;
    }

    public static function store(array $data)
    {
        return Kemasan::create($data);
    }

    public static function update(array $data, $id)
    {
        return Kemasan::find($id)->update($data);
    }

    public static function destroy($id)
    {
        return Kemasan::destroy($id);
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
