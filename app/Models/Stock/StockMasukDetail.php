<?php

namespace App\Models\Stock;

use App\Models\Master\ProdukModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMasukDetail extends Model
{
    use HasFactory;
    use ProdukModelTrait;

    protected $table = 'stock_masuk_detail';
    public $timestamps = false;
    protected $fillable = [
        'stock_masuk_id',
        'stock_id',
        'jumlah'
    ];

    public function stockMasuk()
    {
        return $this->belongsTo(StockMasuk::class, 'stock_masuk_id');
    }
}
