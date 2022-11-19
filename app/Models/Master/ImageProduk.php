<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageProduk extends Model
{
    use HasFactory;
    protected $table = 'image_produk';
    protected $fillable = [
        'link_image_produk',
        'nama_produk',
        'keterangan',
    ];
}
