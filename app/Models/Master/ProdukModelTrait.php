<?php namespace App\Models\Master;

trait ProdukModelTrait
{
    public function produkId()
    {
        return $this->belongsTo(ProdukModelTrait::class, 'produk_id');
    }
}
