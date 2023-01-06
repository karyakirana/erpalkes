<?php

namespace App\Models\Stock;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockKeluarDetail extends Model
{
    use HasFactory;
    protected $table = 'stock_keluar_detail';
    public $timestamps = false;
    protected $fillable = [
        'stock_keluar_id',
        'stock_id',
        'jumlah'
    ];
}
