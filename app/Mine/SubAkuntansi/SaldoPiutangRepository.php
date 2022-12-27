<?php namespace App\Mine\SubAkuntansi;

use App\Models\Akuntansi\SaldoPiutangPenjualan;

class SaldoPiutangRepository
{
    public static function create($customer_id, $saldo)
    {
        return SaldoPiutangPenjualan::create([
            'customer_id' => $customer_id,
            'saldo' => $saldo
        ]);
    }

    public static function saldoIncrement($customer_id, $saldo)
    {
        $query = SaldoPiutangPenjualan::query()->where('customer_id', $customer_id);
        if ($query->doesntExist()){
            return self::create($customer_id, $saldo);
        }
        return $query->increment('saldo', $saldo);
    }

    public static function saldoDecrement($customer_id, $saldo)
    {
        $query = SaldoPiutangPenjualan::query()->where('customer_id', $customer_id);
        return $query->decrement('saldo', $saldo);
    }
}
