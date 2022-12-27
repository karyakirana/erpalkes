<?php namespace App\Mine\SubPembelian;

use App\Models\Pembelian\PembelianPO;

class PembelianPreorderRepository
{
    public static function getById($id)
    {
        return PembelianPO::find($id);
    }

    public static function getAllCurrentActiveCash($deleted = false)
    {
        if ($deleted){
            return PembelianPO::withTrashed()
                ->where('active_cash', session('ClosedCash'))
                ->latest();
        }
        return PembelianPO::where('active_cash', session('ClosedCash'))
            ->latest();
    }

    public static function getAllByActiveCash($activeCash)
    {
        return PembelianPO::latest()->get();
    }

    public static function kode()
    {
        $query = PembelianPO::query()
            ->where('active_cash', session('ClosedCash'))
            ->latest('kode');

        // check last num
        if ($query->doesntExist()) {
            return "0001/PB0/" . date('Y');
        }

        $num = (int)$query->first()->last_num_trans + 1;
        return sprintf("%04s", $num) . "/PB0/" . date('Y');
    }

    public static function store(array $data)
    {
        $data['kode'] = self::kode();
        $data['active_cash'] = session('ClosedCash');
        $pembelianPO = PembelianPO::create($data);
        $pembelianPO->pembelianPoDetail()->createMany($data['dataDetail']);
        return $pembelianPO;
    }

    public static function update(array $data)
    {
        $pembelianPO = PembelianPO::find($data['penjualan_id']);
        $pembelianPO->update($data);
        $pembelianPO->pembelianPoDetail()->createMany($data['dataDetail']);
        return $pembelianPO;
    }

    public static function deleteDetail($id)
    {
        $pembelianPO = PembelianPO::find($id);
        return $pembelianPO->pembelianPoDetail()->delete();
    }

    public static function destroy($id)
    {
        $pembelianPO = PembelianPO::find($id);
        $pembelianPO->pembelianPoDetail()->delete();
        return $pembelianPO->delete();
    }
}
