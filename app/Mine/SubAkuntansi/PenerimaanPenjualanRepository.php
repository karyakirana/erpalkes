<?php namespace App\Mine\SubAkuntansi;

use App\Models\Akuntansi\PenerimaanPenjualan;

class PenerimaanPenjualanRepository
{
    public static function getById($id)
    {
        return PenerimaanPenjualan::find($id);
    }

    public static function datatables()
    {
        return PenerimaanPenjualan::query();
    }

    public static function kode()
    {
        return null;
    }

    public static function store(array $data)
    {
        $data['active_cash'] = session('ClosedCash');
        $data['kode'] = self::kode();
        $penerimaan = PenerimaanPenjualan::create($data);
        $penerimaan->penerimaanPenjualanDetail()->createMany($data['dataDetail']);
        $penerimaan->paymentPenjualan()->createMany($data['dataPayment']);
        // saldo piutang decrement
        SaldoPiutangRepository::saldoDecrement($penerimaan->customer_id, $penerimaan->total_penerimaan);
        return $penerimaan->refresh();
    }

    public static function update(array $data)
    {
        $penerimaan = PenerimaanPenjualan::find($data['penerimaan_penjualan_id']);
        $penerimaan->update($data);
        $penerimaan->penerimaanPenjualanDetail()->createMany($data['dataDetail']);
        $penerimaan->paymentPenjualan()->createMany($data['dataPayment']);
        // saldo piutang decrement
        SaldoPiutangRepository::saldoDecrement($penerimaan->customer_id, $penerimaan->total_penerimaan);
        return $penerimaan->refresh();
    }

    public static function deleteDetail($penerimaan_penjualan_id)
    {
        $penerimaan = PenerimaanPenjualan::find($penerimaan_penjualan_id);
        // saldo piutang increment
        SaldoPiutangRepository::saldoIncrement($penerimaan->customer_id, $penerimaan->total_penerimaan);
        $penerimaan->penerimaanPenjualanDetail()->delete();
        $penerimaan->paymentPenjualan()->delete();
        return $penerimaan->refresh();
    }

    public static function destroy($penerimaan_penjualan_id)
    {
        return self::deleteDetail($penerimaan_penjualan_id)->delete();
    }
}
