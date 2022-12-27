<?php

namespace App\Models\Akuntansi;

use App\Models\Master\Customer;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SaldoPiutangPenjualan extends Model
{
    use HasFactory;
    protected $table = 'saldo_piutang_penjualan';
    public $timestamps = false;
    protected $primaryKey = 'customer_id';
    protected $fillable = [
        'customer_id',
        'saldo'
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
