<?php namespace App\Mine\SubMaster;

use App\Models\Master\ProdukSubKategori;

class ProdukSubKategoriRepository implements MasterRepositoryInterface
{
    public static function getById($id)
    {
        return ProdukSubKategori::find($id);
    }

    public static function getByKategori($kategori_id)
    {
        return ProdukSubKategori::where('kategori_id')
            ->get();
    }

    public static function datatables($deleted = false)
    {
        return ProdukSubKategori::query();
    }

    public static function kode()
    {
        // generate kode
        $builder = ProdukSubKategori::latest('kode')->first();
        if (!$builder){
            $num = 1;
        } else {
            $lastNum = (int) $builder->last_num_master;
            $num = $lastNum + 1;
        }
        return "Z".sprintf("%05s", $num);
    }

    public static function store(array $data)
    {
        $data['kode'] = self::kode();
        return ProdukSubKategori::create($data);
    }

    public static function storeFromProduk(array $data)
    {
        return ProdukSubKategori::create([
            'kode' => self::kode(),
            'kategori_id' => $data['produk_kategori_id'],
            'nama_sub_kategori' => $data['produk_sub_kategori_nama'],
            'keterangan' => $data['produk_sub_kategori_keterangan']
        ]);
    }

    public static function update(array $data, $id)
    {
        return ProdukSubKategori::find($id)->update($data);
    }

    public static function updateFromProduk(array $data, $id)
    {
        return ProdukSubKategori::find($id)->update([
            'kategori_id' => $data['produk_kategori_id'],
            'nama_sub_kategori' => $data['produk_sub_kategori_nama'],
            'keterangan' => $data['produk_sub_kategori_keterangan']
        ]);
    }

    public static function destroy($id)
    {
        // TODO: Implement destroy() method.
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
