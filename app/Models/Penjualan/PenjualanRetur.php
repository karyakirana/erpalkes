<?php

namespace App\Models\Penjualan;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanRetur extends Model
{
    use HasFactory;
    protected $table = 'penjualan_retur';
    protected $fillable = [
        'active_cash',
        'kode',
        'customer_id',
        'user_id',
        'status_penjualan_retur',
        'tgl_nota',
        'total_barang',
        'total_ppn',
        'total_biaya_lain',
        'total_bayar',
        'keterangan',
        'print'
    ];

    public function penjualanReturDetail()
    {
        return $this->hasMany(PenjualanReturDetail::class, 'penjualan_retur_id');
    }
}
