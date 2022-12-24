<?php

namespace App\Models\Persediaan;

use App\Models\Master\Gudang;
use App\Models\Master\ProdukModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persediaan extends Model
{
    use HasFactory, ProdukModelTrait;

    protected $table = 'persediaan';
    protected $fillable = [
        'active_cash',
        'kondisi',
        'gudang_id',
        'produk_id',
        'harga',
        'stock_awal',
        'stock_masuk',
        'stock_keluar',
        'stock_saldo',
        'stock_saldo_koreksi',
        'stock_saldo_lost'
    ];

    public function gudang()
    {
        return $this->belongsTo(Gudang::class, 'gudang_id');
    }
}
