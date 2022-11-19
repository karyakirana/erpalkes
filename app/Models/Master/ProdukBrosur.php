<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukBrosur extends Model
{
    use HasFactory;
    use ProdukModelTrait;
    use ImageModelTrait;

    protected $table = 'produk_brosur';
    protected $fillable = [
        'produk_id',
        'image_id'
    ];
}
