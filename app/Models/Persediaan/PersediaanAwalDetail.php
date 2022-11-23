<?php

namespace App\Models\Persediaan;

use App\Models\Master\ProdukModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersediaanAwalDetail extends Model
{
    use HasFactory;
    use ProdukModelTrait;

    protected $table = 'persediaan_awal_detail';
    protected $fillable = [
        'persediaan_awal_id',
        'produk_id',
        'is_expired',
        'batch',
        'tgl_expired',
        'jumlah',
        'harga_dasar',
        'sub_total',
    ];

    public function persediaanAwal()
    {
        return $this->belongsTo(PersediaanAwal::class, 'persediaan_awal_id');
    }
}
