<?php

namespace App\Models\Penjualan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanReturDetail extends Model
{
    use HasFactory;
    protected $table = 'penjualan_retur_detail';
    protected $fillable = [
        'penjualan_retur_id',
        'produk_id',
        'batch',
        'tgl_expired',
        'harga',
        'jumlah',
        'diskon',
        'sub_total'
    ];

    public function penjualanRetur()
    {
        return $this->belongsTo(PenjualanRetur::class, 'penjualan_retur_id');
    }
}
