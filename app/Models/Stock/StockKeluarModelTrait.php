<?php namespace App\Models\Stock;

trait StockKeluarModelTrait
{
    public function stockKeluar()
    {
        return $this->morphOne(StockKeluar::class,'stockablekeluar', 'stockable_keluar_type', 'stockable_keluar_id');
    }
}
