<?php namespace App\Mine\SubMaster;

interface MasterRepositoryInterface
{
    public static function getById($id);

    public static function datatables($deleted = false);

    public static function kode();

    public static function store(array $data);

    public static function update(array $data, $id);

    public static function destroy($id);

    public static function unDestroy($id);

    public static function forceDestroy($id);
}
