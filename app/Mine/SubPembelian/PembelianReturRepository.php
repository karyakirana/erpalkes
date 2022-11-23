<?php namespace App\Mine\SubPembelian;

use App\Models\Pembelian\PembelianRetur;

class PembelianReturRepository
{
    public static function getById($id)
    {
        return PembelianRetur::find($id);
    }

    public static function getAllCurrentActiveCash($deleted = false)
    {
        if ($deleted){
            return PembelianRetur::withTrashed()
                ->where('active_cash', session('ClosedCash'))
                ->latest()
                ->get();
        }
        return PembelianRetur::where('active_cash', session('ClosedCash'))
            ->latest()->get();
    }

    public static function getAllByActiveCash($activeCash)
    {
        return PembelianRetur::latest()->get();
    }

    public static function kode()
    {
        return null;
    }

    public static function store(array $data)
    {
        $data['kode'] = self::kode();
        $data['active_cash'] = session('ClosedCash');
        $pembelianRetur = PembelianRetur::create($data);
        $pembelianRetur->pembelianReturDetail()->createMany($data['dataDetail']);
        return $pembelianRetur;
    }

    public static function update(array $data)
    {
        $pembelianRetur = PembelianRetur::find($data['penjualan_id']);
        $pembelianRetur->update($data);
        $pembelianRetur->pembelianReturDetail()->createMany($data['dataDetail']);
        return $pembelianRetur;
    }

    public static function deleteDetail($id)
    {
        $pembelianRetur = PembelianRetur::find($id);
        return $pembelianRetur->pembelianReturDetail()->delete();
    }

    public static function destroy($id)
    {
        $pembelianRetur = PembelianRetur::find($id);
        $pembelianRetur->pembelianReturDetail()->delete();
        return $pembelianRetur->delete();
    }
}
