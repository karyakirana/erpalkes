<?php

namespace App\Models\Stock;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMasuk extends Model
{
    use HasFactory;
    protected $table = 'stock_masuk';
    protected $fillable = [
        'active_cash',
        'kode',
        'status_masuk',
        'stockable_masuk_id',
        'stockable_masuk_type',
        'customer_id',
        'supplier_id',
        'user_id',
        'total_barang',
        'keterangan'
    ];

    public function stockMasukDetail()
    {
        return $this->hasMany(StockMasukDetail::class, 'stock_masuk_id');
    }

    public function stockableMasuk()
    {
        return $this->morphTo(__FUNCTION__, 'stockable_masuk_type', 'stockable_masuk_id');
    }
}
