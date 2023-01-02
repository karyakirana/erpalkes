<?php

namespace App\Models\Penjualan;

use App\Models\Master\Produk;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanDetail extends Model
{
    use HasFactory;
    use PenjualanModelTrait;

    protected $table = 'penjualan_detail';
    protected $fillable = [
        'penjualan_id',
        'produk_id',
        'kemasan',
        'harga',
        'jumlah',
        'diskon',
        'sub_total'
    ];

    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
