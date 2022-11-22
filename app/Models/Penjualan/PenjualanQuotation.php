<?php

namespace App\Models\Penjualan;

use App\Models\Master\CustomerModelTrait;
use App\Models\UsersModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanQuotation extends Model
{
    use HasFactory;
    use CustomerModelTrait;
    use UsersModelTrait;

    protected $table = 'penjualan_quotation';
    protected $fillable = [
        'active_cash',
        'kode',
        'customer_id',
        'user_id',
        'status_quotation',
        'tgl_quotation',
        'total_barang',
        'total_ppn',
        'total_biaya_lain',
        'total_bayar',
        'keterangan',
        'print'
    ];

    public function penjualanQuotationDetail()
    {
        return $this->hasMany(PenjualanQuotationDetail::class, 'penjualan_quotation_id');
    }
}
