<?php

namespace App\Models\Akuntansi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentPembelian extends Model
{
    use HasFactory;
    protected $table = 'payment_pembelian';
    public $timestamps = false;
    protected $fillable = [
        'pengeluaran_pembelian_id',
        'kas_id',
        'nominal'
    ];

    public function pengeluaranPembelian()
    {
        return $this->belongsTo(PengeluaranPembelian::class, 'pengeluaran_pembelian_id');
    }

    public function kas()
    {
        return $this->belongsTo(AkunKas::class, 'kas_id');
    }
}
