<?php

namespace App\Models\Pembelian;

use App\Models\Master\ProdukModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianQuotationDetail extends Model
{
    use HasFactory;
    use ProdukModelTrait;

    protected $table = 'pembelian_quotation_detail';
    protected $fillable = [
        'pembelian_quotation_id',
        'produk_id',
        'harga',
        'jumlah',
        'diskon',
        'sub_total'
    ];

    public function pembelianQuotation()
    {
        return $this->belongsTo(PembelianQuotation::class, 'pembelian_quotation_id');
    }
}
