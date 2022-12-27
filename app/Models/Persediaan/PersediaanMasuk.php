<?php

namespace App\Models\Persediaan;

use App\Models\Master\Gudang;
use App\Models\UsersModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersediaanMasuk extends Model
{
    use HasFactory;
    use UsersModelTrait;

    protected $table = 'persediaan_masuk';
    protected $fillable = [
        'persedianable_masuk_id',
        'persediaanable_masuk_type',
        'active_cash',
        'kode',
        'kondisi',
        'gudang_id',
        'user_id',
        'total_barang',
        'total_nominal',
        'keterangan'
    ];

    public function persediaanMasukDetail()
    {
        return $this->hasMany(PersediaanMasukDetail::class, 'persediaan_masuk_id');
    }

    public function persediaanableMasuk()
    {
        return $this->morphTo(__FUNCTION__, 'persediaanable_masuk_type', 'persedianable_masuk_id');
    }

    public function gudang()
    {
        return $this->belongsTo(Gudang::class, 'gudang_id');
    }
}
