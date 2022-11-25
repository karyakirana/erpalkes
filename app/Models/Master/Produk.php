<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;
    protected $table = 'produk';
    protected $fillable = [
        'produk_sub_kategori_id',
        'nama_produk',
        'tipe',
        'isi_kemasan',
        'satuan_beli',
        'satuan_jual',
        'harga',
        'keterangan',
    ];

    public function produkBrosur()
    {
        return $this->hasMany(ProdukBrosur::class, 'produk_id');
    }

    public function produkImage()
    {
        return $this->hasMany(ProdukImage::class, 'produk_id');
    }
}
