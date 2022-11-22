<?php namespace App\Models\Penjualan;

trait PenjualanModelTrait
{
    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'penjualan_id');
    }
}
