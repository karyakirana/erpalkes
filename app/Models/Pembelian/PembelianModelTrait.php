<?php namespace App\Models\Pembelian;

trait PembelianModelTrait
{
    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class, 'pembelian_id');
    }
}
