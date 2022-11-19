<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukImage extends Model
{
    use HasFactory;
    use ProdukModelTrait;
    use ImageModelTrait;

    protected $table = 'produk_image';
    protected $fillable = [
        'produk_id',
        'image_id'
    ];
}
