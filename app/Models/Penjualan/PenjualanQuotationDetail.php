<?php

namespace App\Models\Penjualan;

use App\Models\Master\ProdukModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenjualanQuotationDetail extends Model
{
    use HasFactory;
    use ProdukModelTrait;

    protected $table = 'penjualan_quotation_detail';
    protected $fillable = [
        'penjualan_quotation_id',
        'produk_id',
        'harga',
        'jumlah',
        'diskon',
        'sub_total'
    ];

    public function penjualanQuotation()
    {
        return $this->belongsTo(PenjualanQuotation::class, 'penjualan_quotation_id');
    }
}
