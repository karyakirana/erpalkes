<?php

namespace App\Models\Stock;

use App\Models\UsersModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockAwal extends Model
{
    use HasFactory;
    use UsersModelTrait;

    protected $table = 'stock_awal';
    protected $fillable = [
        'active_cash',
        'kode',
        'persediaan_awal_id',
        'user_id',
        'total_barang',
        'keterangan'
    ];

    public function stockAwalDetail()
    {
        return $this->hasMany(StockAwalDetail::class, 'stock_awal_id');
    }
}
