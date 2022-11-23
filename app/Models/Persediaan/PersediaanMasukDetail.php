<?php

namespace App\Models\Persediaan;

use App\Models\Master\ProdukModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersediaanMasukDetail extends Model
{
    use HasFactory;
    use ProdukModelTrait;

    protected $table = 'persediaan_masuk_detail';
    protected $fillable = [
        'persediaan_masuk_id',
        'produk_id',
        'batch',
        'tgl_expired',
        'jumlah',
        'harga_dasar',
        'sub_total'
    ];

    public function persediaanMasuk()
    {
        return $this->belongsTo(PersediaanMasuk::class, 'persediaan_masuk_id');
    }
}
