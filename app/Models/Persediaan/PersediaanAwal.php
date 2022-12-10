<?php

namespace App\Models\Persediaan;

use App\Models\KodeTrait;
use App\Models\Stock\StockAwal;
use App\Models\UsersModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersediaanAwal extends Model
{
    use HasFactory;
    use UsersModelTrait;
    use KodeTrait;

    protected $table = 'persediaan_awal';
    protected $fillable = [
        'active_cash',
        'kode',
        'kondisi',
        'user_id',
        'total_barang',
        'total_nominal',
        'keterangan'
    ];

    public function persediaanAwalDetail()
    {
        return $this->hasMany(PersediaanAwalDetail::class, 'persediaan_awal_id');
    }

    public function stockAwal()
    {
        return $this->hasOne(StockAwal::class, 'persediaan_awal_id');
    }
}
