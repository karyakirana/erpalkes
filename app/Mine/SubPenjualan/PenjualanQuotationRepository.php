<?php namespace App\Mine\SubPenjualan;

use App\Models\Penjualan\PenjualanQuotation;

class PenjualanQuotationRepository
{
    public static function getById($id)
    {
        return PenjualanQuotation::find($id);
    }

    public static function datatables($deleted = false)
    {
        $query = PenjualanQuotation::query();
        if ($deleted){
            // with deleted account
            $query = $query->withTrashed();
        }
        // without deleted account
        return $query->latest('kode');
    }

    public static function kode()
    {
        // generate kode
        $query = PenjualanQuotation::query()
            ->where('active_cash', session('ClosedCash'))
            ->withTrashed()
            ->latest('kode')->first();

        // check last num
        if (!$query){
            return '0001/PQ/'.date('Y');
        }

        $num = (int)$query->last_num_trans + 1 ;
        return sprintf("%04s", $num)."/PQ/".date('Y');
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
