<?php namespace App\Models\Master;

trait AreaModelTrait
{
    public function area()
    {
        return $this->belongsTo(SalesArea::class, 'area_id');
    }
}
