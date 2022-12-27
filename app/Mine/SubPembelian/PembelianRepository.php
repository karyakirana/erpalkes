<?php namespace App\Mine\SubPembelian;

use App\Models\Pembelian\Pembelian;

class PembelianRepository
{
    public static function getById($id)
    {
        return Pembelian::find($id);
    }

    public static function getAllCurrentActiveCash($deleted = false)
    {
        if ($deleted){
            return Pembelian::withTrashed()
                ->where('active_cash', session('ClosedCash'))
                ->latest()
                ->get();
        }
        return Pembelian::where('active_cash', session('ClosedCash'))
            ->latest()->get();
    }

    public static function getAllByActiveCash($activeCash)
    {
        return Pembelian::latest()->get();
    }

    public static function kode()
    {
        $query = Pembelian::query()
            ->where('active_cash', session('ClosedCash'))
            ->latest('kode');

        // check last num
        if ($query->doesntExist()) {
            return "0001/PB/" . date('Y');
        }

        $num = (int)$query->first()->last_num_trans + 1;
        return sprintf("%04s", $num) . "/PB/" . date('Y');
    }

    public static function store(array $data)
    {
        $data['kode'] = self::kode();
        $data['active_cash'] = session('ClosedCash');
        $pembelian = Pembelian::create($data);
        $pembelian->pembelianDetail()->createMany($data['dataDetail']);
        return $pembelian;
    }

    public static function update(array $data)
    {
        $pembelian = Pembelian::find($data['penjualan_id']);
        $pembelian->update($data);
        $pembelian->pembelianDetail()->createMany($data['dataDetail']);
        return $pembelian;
    }

    public static function deleteDetail($id)
    {
        $pembelian = Pembelian::find($id);
        return $pembelian->pembelianDetail()->delete();
    }

    public static function destroy($id)
    {
        $pembelian = Pembelian::find($id);
        $pembelian->pembelianDetail()->delete();
        return $pembelian->delete();
    }
}
