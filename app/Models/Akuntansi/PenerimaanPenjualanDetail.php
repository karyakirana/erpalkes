<?php

namespace App\Models\Akuntansi;

use App\Models\Penjualan\Penjualan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaanPenjualanDetail extends Model
{
    use HasFactory;
    protected $table = 'penerimaan_penjualan_detail';
    public $timestamps = false;
    protected $fillable = [
        'penerimaan_penjualan_id',
        'penjualan_id',
        'status',
        'nominal_bayar',
        'sisa_bayar'
    ];

    public function penerimaanPenjualan()
    {
        return $this->belongsTo(Penjualan::class, 'penjualan_id');
    }
}
