<?php

namespace App\Models\Akuntansi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NeracaSaldoAwal extends Model
{
    use HasFactory;
    protected $table = 'neraca_saldo_awal';
    protected $fillable = [
        'active_cash',
        'akun_id',
        'debet',
        'kredit'
    ];

    public function akun()
    {
        return $this->belongsTo(Akun::class, 'akun_id');
    }
}
