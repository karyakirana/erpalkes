<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukKategori extends Model
{
    use HasFactory;
    protected $table = 'produk_kategori';
    protected $fillable = [
        'kategori_id',
        'kode',
        'kategori',
        'is_sub_kategori',
    ];
}
