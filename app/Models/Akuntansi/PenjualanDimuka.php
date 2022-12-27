<?php

namespace App\Models\Akuntansi;

use App\Models\Penjualan\Penjualan;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanDimuka extends Model
{
    use HasFactory;
    protected $table = 'penjualan_dimuka';
    protected $fillable = [
        'tipe',
        'penjualan_id',
        'status'
    ];

    public function penjualan()
    {
        return $this->belongsTo(Penjualan::class, 'penjualan_id');
    }
}
