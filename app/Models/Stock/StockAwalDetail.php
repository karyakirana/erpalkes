<?php

namespace App\Models\Stock;

use App\Models\Master\ProdukModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockAwalDetail extends Model
{
    use HasFactory;

    protected $table = 'stock_awal_detail';
    public $timestamps = false;
    protected $fillable = [
        'stock_awal_id',
        'stock_id',
        'jumlah'
    ];

    public function stock()
    {
        return $this->belongsTo(Stock::class, 'stock_id');
    }
}
