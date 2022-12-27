<?php

namespace App\Models\Akuntansi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HutangPembelian extends Model
{
    use HasFactory;
    protected $table = 'hutang_pembelian';
    protected $fillable = [
        'hutangable_pembelian_id',
        'hutangable_pembelian_type',
        'debet',
        'kredit'
    ];

    public function hutangablePembelian()
    {
        return $this->morphTo(__FUNCTION__, 'hutangable_pembelian_type', 'hutangable_pembelian_id');
    }
}
