<?php

namespace App\Models\Penjualan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanDetail extends Model
{
    use HasFactory;
    use PenjualanModelTrait;

    protected $table = 'penjualan_detail';
    protected $fillable = [
        'penjualan_id',
        'stock_id',
        'harga',
        'jumlah',
        'diskon',
        'sub_total'
    ];
}
