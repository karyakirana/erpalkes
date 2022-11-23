<?php namespace App\Mine\SubPenjualan;

use App\Models\Penjualan\PenjualanRetur;

class PenjualanReturRepository
{
    public function getById($id)
    {
        return PenjualanRetur::find($id);
    }

    public static function getAllCurrentActiveCash($deleted = false)
    {
        if ($deleted){
            return PenjualanRetur::withTrashed()
                ->where('active_cash', session('ClosedCash'))
                ->latest()
                ->get();
        }
        return PenjualanRetur::where('active_cash', session('ClosedCash'))
            ->latest()->get();
    }

    public static function getAllByActiveCash($activeCash)
    {
        return PenjualanRetur::latest()->get();
    }

    public static function kode()
    {
        return null;
    }

    public static function store(array $data)
    {
        $data['kode'] = self::kode();
        $data['active_cash'] = session('ClosedCash');
        $penjualanRetur = PenjualanRetur::create($data);
        $penjualanRetur->penjualanReturDetail()->createMany($data['dataDetail']);
        return $penjualanRetur;
    }

    public static function update(array $data)
    {
        $penjualanRetur = PenjualanRetur::find($data['penjualan_id']);
        $penjualanRetur->update($data);
        $penjualanRetur->penjualanReturDetail()->createMany($data['dataDetail']);
        return $penjualanRetur;
    }

    public static function deleteDetail($id)
    {
        $penjualanRetur = PenjualanRetur::find($id);
        return $penjualanRetur->penjualanReturDetail()->delete();
    }

    public static function destroy($id)
    {
        $penjualanRetur = PenjualanRetur::find($id);
        $penjualanRetur->penjualanReturDetail()->delete();
        return $penjualanRetur->delete();
    }
}
