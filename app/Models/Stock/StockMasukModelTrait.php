<?php namespace App\Models\Stock;

trait StockMasukModelTrait
{
    public function stockMasuk()
    {
        return $this->morphOne(StockMasuk::class, 'stockableMasuk', 'stockable_masuk_type', 'stockable_masuk_id');
    }
}
