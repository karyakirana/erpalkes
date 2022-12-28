<?php namespace App\Mine\SubPenjualan;

use App\Models\Penjualan\PenjualanPreorder;

class PenjualanPreorderRepository
{
    public static function getById($id)
    {
        return PenjualanPreorder::find($id);
    }

    public static function datatables()
    {
        return PenjualanPreorder::query();
    }

    public static function getByPenjualanQuotation()
    {
        //
    }

    public static function kode()
    {
        $query = PenjualanPreorder::query()
            ->where('active_cash', session('ClosedCash'))
            ->latest('kode');

        // check last num
        if ($query->doesntExist()){
            return "0001/PO/".date('Y');
        }

        $num = (int) $query->first()->last_num_trans + 1;
        return sprintf("%04s", $num)."/PO/".date('Y');
    }

    public static function store(array $data)
    {
        $data['active_cash'] = session('ClosedCash');
        $data['kode'] = self::kode();
        $penjualanPreorder = PenjualanPreorder::create($data);
        $penjualanPreorder->penjualanPreorderDetail()->createMany($data['dataDetail']);
        return $penjualanPreorder;
    }

    public static function update(array $data)
    {
        $penjualanPreorder = PenjualanPreorder::find($data['penjualan_preorder_id']);
        $penjualanPreorder->update($data);
        $penjualanPreorder->penjualanPreorderDetail()->createMany($data['dataDetail']);
        return $penjualanPreorder;
    }

    public static function destroyDetail($id)
    {
        $penjualanPreorder = PenjualanPreorder::find($id);
        return $penjualanPreorder->penjualanPreorderDetail()->delete();
    }

    public static function destroy($id)
    {
        $penjualanPreorder = PenjualanPreorder::find($id);
        $penjualanPreorder->penjualanPreorderDetail()->delete();
        return $penjualanPreorder->delete();
    }
}
