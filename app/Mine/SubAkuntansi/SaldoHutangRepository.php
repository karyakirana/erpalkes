<?php namespace App\Mine\SubAkuntansi;

use App\Models\Akuntansi\SaldoHutangPembelian;

class SaldoHutangRepository
{
    public static function create($supplier_id, $saldo)
    {
        return SaldoHutangPembelian::create([
            'supplier_id' => $supplier_id,
            'saldo' => $saldo
        ]);
    }

    public static function saldoIncrement($supplier_id, $saldo)
    {
        $query = SaldoHutangPembelian::query()->where('supplier_id', $supplier_id);
        if ($query->doesntExist()){
            return self::create($supplier_id, $saldo);
        }
        return $query->increment('saldo', $saldo);
    }

    public static function saldoDecrement($supplier_id, $saldo)
    {
        $query = SaldoHutangPembelian::query()->where('supplier_id', $supplier_id);
        return $query->decrement('saldo', $saldo);
    }
}
