<?php

namespace App\Models\Stock;

use App\Models\Master\Gudang;
use App\Models\Master\ProdukModelTrait;
use App\Models\Persediaan\Persediaan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    use ProdukModelTrait;

    protected $table = 'stock';

    protected $fillable = [
        'active_cash',
        'kondisi',
        'gudang_id',
        'produk_id',
        'batch',
        'tgl_expired',
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

    public function persediaan()
    {
        return $this->hasMany(Persediaan::class, 'stock_id');
    }
}
