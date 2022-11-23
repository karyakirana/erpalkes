<?php

namespace App\Models\Stock;

use App\Models\Master\ProdukModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockAwalDetail extends Model
{
    use HasFactory;
    use ProdukModelTrait;

    protected $table = 'stock_awal_detail';
    protected $fillable = [
        'stock_awal_id',
        'produk_id',
        'batch',
        'tgl_expired',
        'jumlah'
    ];
}
