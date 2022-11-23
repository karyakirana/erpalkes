<?php

namespace App\Models\Pembelian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PembelianRetur extends Model
{
    use HasFactory;

    protected $table = 'pembelian_retur';
    protected $fillable = [
        'active_cash',
        'kode',
        'supplier_id',
        'user_id',
        'status_pembelian_retur',
        'tgl_pembelian_retur',
        'total_barang',
        'total_ppn',
        'total_biaya_lain',
        'total_bayar',
        'keterangan',
        'print'
    ];

    public function pembelianReturDetail()
    {
        return $this->hasMany(PembelianReturDetail::class, 'pembelian_retur_id');
    }
}
