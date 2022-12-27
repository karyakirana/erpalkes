<?php

namespace App\Models\Stock;

use App\Models\KodeTrait;
use App\Models\Persediaan\PersediaanAwal;
use App\Models\UsersModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockAwal extends Model
{
    use HasFactory;
    use UsersModelTrait, KodeTrait;

    protected $table = 'stock_awal';
    protected $fillable = [
        'active_cash',
        'kode',
        'kondisi',
        'gudang_id',
        'persediaan_awal_id',
        'user_id',
        'total_barang',
        'keterangan'
    ];

    public function stockAwalDetail()
    {
        return $this->hasMany(StockAwalDetail::class, 'stock_awal_id');
    }

    public function persediaanAwal()
    {
        return $this->belongsTo(PersediaanAwal::class, 'persediaan_awal_id');
    }
}
