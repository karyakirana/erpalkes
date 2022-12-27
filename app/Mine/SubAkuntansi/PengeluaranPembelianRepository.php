<?php namespace App\Mine\SubAkuntansi;

use App\Models\Akuntansi\PengeluaranPembelian;

class PengeluaranPembelianRepository
{
    public static function getById($id)
    {
        return PengeluaranPembelian::find($id);
    }

    public static function kode()
    {
        return null;
    }

    public static function store(array $data)
    {
        $data['active_cash'] = session('ClosedCash');
        $data['kode'] = self::kode();
        $pengeluaran = PengeluaranPembelian::create($data);
        $pengeluaran->pengeluaranPembelianDetail()->createMany($data['dataDetail']);
        $pengeluaran->paymenPembelian()->createMany($data['dataPayment']);
        SaldoHutangRepository::saldoDecrement($pengeluaran->supplier_id, $pengeluaran->total_pengeluaran);
        return $pengeluaran->refresh();
    }

    public static function update(array $data)
    {
        $pengeluaran = PengeluaranPembelian::find($data['pengeluaran_pembelian_id']);
        $pengeluaran->update($data);
        $pengeluaran->pengeluaranPembelianDetail()->createMany($data['dataDetail']);
        $pengeluaran->paymenPembelian()->createMany($data['dataPayment']);
        SaldoHutangRepository::saldoDecrement($pengeluaran->supplier_id, $pengeluaran->total_pengeluaran);
        return $pengeluaran->refresh();
    }

    public static function deleteDetail($pengeluaran_pembelian_id)
    {
        $pengeluaran = PengeluaranPembelian::find($pengeluaran_pembelian_id);
        SaldoHutangRepository::saldoIncrement($pengeluaran->supplier_id, $pengeluaran->total_pengeluaran);
        $pengeluaran->pengeluaranPembelianDetail()->delete();
        $pengeluaran->paymenPembelian()->delete();
        return $pengeluaran->refresh();
    }

    public static function destroy($pengeluaran_pembelian_id)
    {
        return self::deleteDetail($pengeluaran_pembelian_id)->delete();
    }
}
