<?php

namespace App\Models\Persediaan;

use App\Models\Master\ProdukModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersediaanAwalDetail extends Model
{
    use HasFactory;

    protected $table = 'persediaan_awal_detail';
    public $timestamps = false;
    protected $fillable = [
        'persediaan_awal_id',
        'persediaan_id',
        'jumlah',
        'harga',
        'sub_total',
    ];

    public function persediaanAwal()
    {
        return $this->belongsTo(PersediaanAwal::class, 'persediaan_awal_id');
    }

    public function persediaan()
    {
        return $this->belongsTo(Persediaan::class, 'persediaan_id');
    }
}
