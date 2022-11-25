<?php

namespace App\Models\Master;

use App\Models\KodeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukKategori extends Model
{
    use HasFactory;
    use KodeTrait;

    protected $table = 'produk_kategori';
    protected $fillable = [
        'kode',
        'kategori',
        'keterangan'
    ];

    public function subKategori()
    {
        return $this->hasMany(ProdukSubKategori::class, 'kategori_id');
    }
}
