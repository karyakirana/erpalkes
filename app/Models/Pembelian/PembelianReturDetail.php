<?php

namespace App\Models\Pembelian;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianReturDetail extends Model
{
    use HasFactory;
    protected $table = 'pembelian_retur_detail';
    protected $fillable = [
        'pembelian_retur_id',
        'stock_id',
        'harga_dasar',
        'jumlah',
        'diskon',
        'sub_total',
    ];

    public function pembelianRetur()
    {
        return $this->belongsTo(PembelianRetur::class, 'pembelian_retur_id');
    }
}
