<?php namespace App\Models\Master;

trait SupplierModelTrait
{
    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
