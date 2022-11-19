<?php namespace App\Models\Master;

trait ImageModelTrait
{
    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id');
    }
}
