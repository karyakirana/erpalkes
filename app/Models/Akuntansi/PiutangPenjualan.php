<?php

namespace App\Models\Akuntansi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PiutangPenjualan extends Model
{
    use HasFactory;
    protected $table = 'piutang_penjualan';
    protected $fillable = [
        'piutangable_penjualan_id',
        'piutangable_penjualan_type',
        'debet',
        'kredit'
    ];

    public function piutangablePenjualan()
    {
        return $this->morphTo(__FUNCTION__, 'piutangable_penjualan_type', 'piutangable_penjualan_id');
    }
}
