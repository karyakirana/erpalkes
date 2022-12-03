<?php

namespace App\Models\Penjualan;

use App\Models\Master\CustomerModelTrait;
use App\Models\Stock\StockKeluar;
use App\Models\Stock\StockKeluarModelTrait;
use App\Models\UsersModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    use UsersModelTrait;
    use CustomerModelTrait;
    use StockKeluarModelTrait;

    protected $table = 'penjualan';
    protected $fillable = [
        'active_cash',
        'kode',
        'penjualan_quotation_id',
        'customer_id',
        'user_id',
        'jenis_penjualan',
        'status_invoice',
        'tgl_nota',
        'tgl_tempo',
        'total_barang',
        'total_ppn',
        'total_biaya_lain',
        'total_bayar',
        'keterangan',
        'print'
    ];

    public function penjualanDetail()
    {
        return $this->hasMany(PenjualanDetail::class, 'penjualan_id');
    }

    public function penjualanQuotation()
    {
        return $this->belongsTo(PenjualanQuotation::class, 'penjualan_quotation_id');
    }
}
