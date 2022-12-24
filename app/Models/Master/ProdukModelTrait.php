<?php namespace App\Models\Master;

trait ProdukModelTrait
{
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
