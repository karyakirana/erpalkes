<?php

namespace App\Models\Persediaan;

use App\Models\UsersModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersediaanMasuk extends Model
{
    use HasFactory;
    use UsersModelTrait;

    protected $table = 'persediaan_masuk';
    protected $fillable = [
        'active_cash',
        'kode',
        'user_id',
        'persedianable_masuk_id',
        'persediaanable_masuk_type',
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
}
