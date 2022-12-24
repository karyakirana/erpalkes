<?php namespace App\Mine\SubPembelian;

use App\Models\Pembelian\PembelianQuotation;

class PembelianQuotationRepository
{
    public static function getById($id)
    {
        return PembelianQuotation::find($id);
    }

    public static function getAllCurrentActiveCash($deleted = false)
    {
        if ($deleted){
            return PembelianQuotation::withTrashed()
                ->where('active_cash', session('ClosedCash'))
                ->latest()
                ->get();
        }
        return PembelianQuotation::where('active_cash', session('ClosedCash'))
            ->latest()->get();
    }

    public static function getAllByActiveCash($activeCash)
    {
        return PembelianQuotation::latest()->get();
    }

    public static function kode()
    {
        $query = PembelianQuotation::query()
            ->where('active_cash', session('ClosedCash'))
            ->latest('kode');

        // check last num
        if ($query->doesntExist()) {
            return "0001/PB/" . date('Y');
        }

        $num = (int)$query->first()->last_num_trans + 1;
        return sprintf("%04s", $num) . "/PQ/" . date('Y');
    }

    public static function store(array $data)
    {
        $data['kode'] = self::kode();
        $data['active_cash'] = session('ClosedCash');
        $pembelianQuotation = PembelianQuotation::create($data);
        $pembelianQuotation->pembelianQuotationDetail()->createMany($data['dataDetail']);
        return $pembelianQuotation;
    }

    public static function update(array $data)
    {
        $pembelianQuotation = PembelianQuotation::find($data['penjualan_id']);
        $pembelianQuotation->update($data);
        $pembelianQuotation->pembelianQuotationDetail()->createMany($data['dataDetail']);
        return $pembelianQuotation;
    }

    public static function deleteDetail($id)
    {
        $pembelianQuotation = PembelianQuotation::find($id);
        return $pembelianQuotation->pembelianQuotationDetail()->delete();
    }

    public static function destroy($id)
    {
        $pembelianQuotation = PembelianQuotation::find($id);
        $pembelianQuotation->pembelianQuotationDetail()->delete();
        return $pembelianQuotation->delete();
    }
}
