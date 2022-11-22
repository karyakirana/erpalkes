<?php

namespace App\Models\Persediaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersediaanKeluarDetail extends Model
{
    use HasFactory;

    protected $table = 'persediaan_keluar_detail';
    protected $fillable = [
        'persediaan_keluar_id',
        'stock_id',
        'jumlah',
        'harga_dasar',
        'sub_total'
    ];

    public function persediaanKeluar()
    {
        return $this->belongsTo(PersediaanKeluar::class, 'persediaan_keluar_id');
    }
}
