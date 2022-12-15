<?php

namespace App\Models\Master;

use App\Models\KodeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
    use HasFactory, KodeTrait, SoftDeletes;

    protected $table = 'produk';
    protected $fillable = [
        'produk_kategori_id',
        'kode',
        'nama_produk',
        'tipe',
        'merk',
        'isi_kemasan',
        'satuan_beli',
        'satuan_jual',
        'harga',
        'keterangan',
    ];

    public function produkKategori()
    {
        return $this->belongsTo(ProdukKategori::class, 'produk_sub_kategori_id');
    }

    public function produkBrosur()
    {
        return $this->hasMany(ProdukBrosur::class, 'produk_id');
    }

    public function produkImage()
    {
        return $this->hasMany(ProdukImage::class, 'produk_id');
    }
}
