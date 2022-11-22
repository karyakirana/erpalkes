<?php

namespace App\Models\Pembelian;

use App\Models\Master\ProdukModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianDetail extends Model
{
    use HasFactory;
    use PembelianModelTrait;
    use ProdukModelTrait;

    protected $table = 'pembelian_detail';
    protected $fillable = [
        'pembelian_id',
        'produk_id',
        'tgl_produksi',
        'tgl_expired',
        'harga',
        'jumlah',
        'diskon',
        'sub_total'
    ];
}
