<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageBrosur extends Model
{
    use HasFactory;
    protected $table = 'image_brosur';
    protected $fillable = [
        'link_image_brosur',
        'nama_brosur',
        'keterangan',
    ];
}
