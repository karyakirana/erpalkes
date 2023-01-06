<?php

namespace App\Models\Persediaan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersediaanKeluarDetail extends Model
{
    use HasFactory;

    protected $table = 'persediaan_keluar_detail';
    public $timestamps = false;
    protected $fillable = [
        'persediaan_keluar_id',
        'persediaan_id',
        'batch',
        'tgl_expired',
        'jumlah',
        'harga',
        'sub_total'
    ];

    public function persediaanKeluar()
    {
        return $this->belongsTo(PersediaanKeluar::class, 'persediaan_keluar_id');
    }
}
