<?php

namespace App\Models\Persediaan;

use App\Models\KodeTrait;
use App\Models\UsersModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersediaanKeluar extends Model
{
    use HasFactory;
    use UsersModelTrait;
    use KodeTrait;

    protected $table = 'persediaan_keluar';
    protected $fillable = [
        'active_cash',
        'kode',
        'kondisi',
        'gudang_id',
        'user_id',
        'persedianable_keluar_id',
        'persediaanable_keluar_type',
        'total_barang',
        'total_nominal',
        'keterangan'
    ];

    public function persediaanKeluarDetail()
    {
        return $this->hasMany(PersediaanKeluarDetail::class, 'persediaan_keluar_id');
    }

    public function persediaanableKeluar()
    {
        return $this->morphTo(__FUNCTION__, 'persediaanable_keluar_type', 'persediaanable_keluar_id');
    }
}
