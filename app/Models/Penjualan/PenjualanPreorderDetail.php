<?php

namespace App\Models\Penjualan;

use App\Models\Master\ProdukModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanPreorderDetail extends Model
{
    use HasFactory, ProdukModelTrait;
    protected $table = 'penjualan_preorder_detail';
    protected $fillable = [
        'penjualan_preorder_id',
        'produk_id',
        'harga',
        'jumlah',
        'diskon',
        'sub_total'
    ];

    public function penjualan_preorder()
    {
        return $this->belongsTo(PenjualanPreorder::class, 'penjualan_preorder_id');
    }
}
