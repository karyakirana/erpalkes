<?php namespace App\Models\Master;

trait CustomerModelTrait
{
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
