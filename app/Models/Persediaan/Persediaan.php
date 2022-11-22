<?php

namespace App\Models\Persediaan;

use App\Models\Master\ProdukModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persediaan extends Model
{
    use HasFactory;
    use ProdukModelTrait;

    protected $table = 'persediaan';
    protected $fillable = [
        'active_cash',
        'produk_id',
        'tgl_produksi',
        'tgl_expired',
        'harga_dasar',
        'stock_awal',
        'stock_masuk',
        'stock_keluar',
        'stock_saldo',
        'stock_saldo_koreksi',
        'stock_saldo_lost'
    ];
}
