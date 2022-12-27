<?php

namespace App\Models\Akuntansi;

use App\Models\Pembelian\Pembelian;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengeluaranPembelianDetail extends Model
{
    use HasFactory;
    protected $table = 'pengeluaran_pembelian_detail';
    public $timestamps = false;
    protected $fillable = [
        'pengeluaran_pembelian_id',
        'pembelian_id',
        'status',
        'nominal_bayar',
        'sisa_bayar'
    ];

    public function pengeluaranPembelian()
    {
        return $this->belongsTo(PengeluaranPembelian::class, 'pengeluaran_pembelian_id');
    }

    public function pembelian()
    {
        return $this->belongsTo(Pembelian::class, 'pembelian_id');
    }
}
