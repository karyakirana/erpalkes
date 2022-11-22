<?php

namespace App\Models\Pembelian;

use App\Models\Master\ProdukModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianPODetail extends Model
{
    use HasFactory;
    use ProdukModelTrait;

    protected $table = 'pembelian_po_detail';
    protected $fillable = [
        'pembelian_po_id',
        'produk_id',
        'harga',
        'jumlah',
        'diskon',
        'sub_total'
    ];
}
