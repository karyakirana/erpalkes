<?php

namespace App\Models\Master;

use App\Models\KodeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukSubKategori extends Model
{
    use HasFactory, KodeTrait;
    public $timestamps = false;
    protected $table = 'produk_sub_kategori';
    protected $fillable = [
        'kategori_id',
        'kode',
        'nama_sub_kategori',
        'keterangan'
    ];

    public function kategori()
    {
        return $this->belongsTo(ProdukKategori::class, 'kategori_id');
    }
}
