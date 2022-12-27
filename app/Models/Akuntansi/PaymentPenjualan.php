<?php

namespace App\Models\Akuntansi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentPenjualan extends Model
{
    use HasFactory;
    protected $table = 'payment_penjualan';
    public $timestamps = false;
    protected $fillable = [
        'penerimaan_penjualan_id',
        'kas_id',
        'nominal'
    ];

    public function penerimaanPenjualan()
    {
        return $this->belongsTo(PenerimaanPenjualan::class, 'penerimaan_penjualan_id');
    }

    public function kas()
    {
        return $this->belongsTo(AkunKas::class, 'kas_id');
    }
}
