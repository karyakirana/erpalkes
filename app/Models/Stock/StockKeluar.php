<?php

namespace App\Models\Stock;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockKeluar extends Model
{
    use HasFactory;
    protected $table = 'stock_keluar';
    protected $fillable = [
        'active_cash',
        'kode',
        'status_keluar',
        'stockable_keluar_id',
        'stockable_keluar_type',
        'customer_id',
        'supplier_id',
        'user_id',
        'total_barang',
        'keterangan'
    ];

    public function stockKeluarDetail()
    {
        return $this->belongsTo(StockKeluarDetail::class, 'stock_keluar_id');
    }

    public function stockableKeluar()
    {
        return $this->morphTo(__FUNCTION__, 'stockable_keluar_type', 'stockable_keluar_id');
    }
}
