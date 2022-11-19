<?php namespace App\Mine\SubMaster;

use App\Models\Master\Produk;

class ProdukService
{
    public static function handleGetById($id)
    {
        return Produk::find($id);
    }

    public static function handleDatatables()
    {
        return Produk::latest()->get();
    }

    public static function kode()
    {
        return null;
    }

    public static function handleStore(array $data)
    {
        return Produk::create($data);
    }

    public static function handleUpdate(int $id, array $data)
    {
        $produk = Produk::find($id);
        return $produk->update($data);
    }

    public static function handleDestroy(int $id)
    {
        return Produk::destroy($id);
    }

    /** Image Processing */
    public static function handleSetProdukImage(int $produk_id, int $image_id)
    {
        //
    }

    public static function handleUnsetProdukImage(int $produk_id, int $image_id)
    {
        //
    }

    public static function handleSetProdukBrosur(int $produk_id, int $image_id)
    {
        //
    }

    public static function handleUnsetProdukBrosur(int $produk_id, int $image_id)
    {
        //
    }

    public static function handleStoreImage(string $image_path)
    {
        //
    }

    public static function handleDestroyImage(int $image_id)
    {
        //
    }
}
