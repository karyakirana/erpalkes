<?php

namespace App\Models\Akuntansi;

use App\Models\Master\Supplier;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoHutangPembelian extends Model
{
    use HasFactory;
    protected $table = 'saldo_hutang_pembelian';
    public $timestamps = false;
    protected $primaryKey = 'supplier_id';
    protected $fillable = [
        'supplier_id',
        'saldo'
    ];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'supplier_id');
    }
}
