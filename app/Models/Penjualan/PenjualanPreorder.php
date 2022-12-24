<?php

namespace App\Models\Penjualan;

use App\Models\KodeTrait;
use App\Models\Master\CustomerModelTrait;
use App\Models\Master\Pegawai;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanPreorder extends Model
{
    use HasFactory, CustomerModelTrait, KodeTrait;
    protected $table = 'penjualan_preorder';
    protected $fillable = [
        'penjualan_quotation_id',
        'tgl_preorder',
        'active_cash',
        'kode',
        'tipe',
        'customer_id',
        'sales_id',
        'user_id',
        'status',
        'total_barang',
        'total_ppn',
        'total_biaya_lain',
        'total_bayar',
        'keterangan'
    ];

    public function penjualanPreorderDetail()
    {
        return $this->hasMany(PenjualanPreorderDetail::class, 'penjualan_preorder_id');
    }

    public function penjualanQuotation()
    {
        return $this->belongsTo(PenjualanQuotation::class, 'penjualan_quotation_id');
    }

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'penjualan_preorder_id');
    }

    public function sales()
    {
        return $this->belongsTo(Pegawai::class, 'sales_id');
    }

    public function users()
    {
        return $this->belongsTo(User::class, 'sales_id');
    }
}
