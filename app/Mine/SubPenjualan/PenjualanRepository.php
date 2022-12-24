<?php namespace App\Mine\SubPenjualan;

use App\Models\Penjualan\Penjualan;

class PenjualanRepository
{
    public static function getById($id)
    {
        return Penjualan::find($id);
    }

    public static function getAllCurrentActiveCash($deleted = false)
    {
        if ($deleted){
            return Penjualan::withTrashed()
                ->where('active_cash', session('ClosedCash'))
                ->latest()
                ->get();
        }
        return Penjualan::where('active_cash', session('ClosedCash'))
            ->latest()->get();
    }

    public static function getAllByActiveCash($activeCash)
    {
        return Penjualan::latest()->get();
    }

    public static function kode()
    {
        $query = Penjualan::query()
            ->where('active_cash', session('ClosedCash'))
            ->latest('kode');

        // check last num
        if ($query->doesntExist()) {
            return "0001/PJ/" . date('Y');
        }

        $num = (int)$query->first()->last_num_trans + 1;
        return sprintf("%04s", $num) . "/PJ/" . date('Y');
    }

    public static function store(array $data)
    {
        $data['kode'] = self::kode();
        $data['active_cash'] = session('ClosedCash');
        $penjualan = Penjualan::create($data);
        $penjualan->penjualanDetail()->createMany($data['dataDetail']);
        return $penjualan;
    }

    public static function update(array $data)
    {
        $penjualan = Penjualan::find($data['penjualan_id']);
        $penjualan->update($data);
        $penjualan->penjualanDetail()->createMany($data['dataDetail']);
        return $penjualan;
    }

    public static function deleteDetail($id)
    {
        $penjualan = Penjualan::find($id);
        return $penjualan->penjualanDetail()->delete();
    }

    public static function destroy($id)
    {
        $penjualan = Penjualan::find($id);
        $penjualan->penjualanDetail()->delete();
        return $penjualan->delete();
    }
}
