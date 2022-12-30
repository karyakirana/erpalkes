<?php

namespace App\Models\Persediaan;

use App\Models\KodeTrait;
use App\Models\Master\Gudang;
use App\Models\Stock\StockAwal;
use App\Models\UsersModelTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersediaanAwal extends Model
{
    use HasFactory;
    use UsersModelTrait;
    use KodeTrait;

    protected $table = 'persediaan_awal';
    protected $fillable = [
        'tgl_persediaan_awal',
        'active_cash',
        'kode',
        'kondisi',
        'gudang_id',
        'user_id',
        'total_barang',
        'total_nominal',
        'keterangan'
    ];

    public function tglPersediaanAwal():Attribute
    {
        return Attribute::make(
            get: fn($value) => tanggalan_format($value),
            set: fn($value) => tanggalan_database_format($value, 'd-M-Y')
        );
    }

    public function gudang()
    {
        return $this->belongsTo(Gudang::class, 'gudang_id');
    }

    public function persediaanAwalDetail()
    {
        return $this->hasMany(PersediaanAwalDetail::class, 'persediaan_awal_id');
    }

    public function stockAwal()
    {
        return $this->hasOne(StockAwal::class, 'persediaan_awal_id');
    }
}
