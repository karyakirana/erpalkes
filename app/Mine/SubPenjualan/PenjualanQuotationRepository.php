<?php namespace App\Mine\SubPenjualan;

use App\Models\Penjualan\PenjualanQuotation;

class PenjualanQuotationRepository
{
    public static function getById($id)
    {
        return PenjualanQuotation::find($id);
    }

    public static function getAllCurrentActiveCash($deleted = false)
    {
        if ($deleted){
            return PenjualanQuotation::withTrashed()
                ->where('active_cash', session('ClosedCash'))
                ->latest()
                ->get();
        }
        return PenjualanQuotation::where('active_cash', session('ClosedCash'))
            ->latest()->get();
    }

    public static function getAllByActiveCash($activeCash)
    {
        return PenjualanQuotation::latest()->get();
    }

    public static function kode()
    {
        return null;
    }

    public static function store(array $data)
    {
        $data['kode'] = self::kode();
        $data['active_cash'] = session('ClosedCash');
        $penjualanQuotation = PenjualanQuotation::create($data);
        $penjualanQuotation->penjualanQuotationDetail()->createMany($data['dataDetail']);
        return $penjualanQuotation;
    }

    public static function update(array $data)
    {
        $penjualanQuotation = PenjualanQuotation::find($data['penjualan_id']);
        $penjualanQuotation->update($data);
        $penjualanQuotation->penjualanQuotationDetail()->createMany($data['dataDetail']);
        return $penjualanQuotation;
    }

    public static function deleteDetail($id)
    {
        $penjualanQuotation = PenjualanQuotation::find($id);
        return $penjualanQuotation->penjualanQuotationDetail()->delete();
    }

    public static function destroy($id)
    {
        $penjualanQuotation = PenjualanQuotation::find($id);
        $penjualanQuotation->penjualanQuotationDetail()->delete();
        return $penjualanQuotation->delete();
    }
}
