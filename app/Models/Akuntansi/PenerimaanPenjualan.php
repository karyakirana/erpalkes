<?php

namespace App\Models\Akuntansi;

use App\Models\KodeTrait;
use App\Models\Master\CustomerModelTrait;
use App\Models\UsersModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaanPenjualan extends Model
{
    use HasFactory, KodeTrait, CustomerModelTrait, UsersModelTrait;
    protected $table = 'penerimaan_penjualan';
    protected $fillable = [
        'active_cash',
        'kode',
        'tgl_penerimaan',
        'customer_id',
        'user_id',
        'total_penerimaan',
        'keterangan'
    ];

    public function penerimaanPenjualanDetail()
    {
        return $this->hasMany(PenerimaanPenjualanDetail::class, 'penerimaan_penjualan_id');
    }

    public function paymentPenjualan()
    {
        return $this->hasMany(PaymentPenjualan::class, 'penerimaan_penjualan_id');
    }
}
