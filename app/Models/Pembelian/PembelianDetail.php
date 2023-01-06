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
    public $timestamps = false;
    protected $fillable = [
        'pembelian_id',
        'produk_id',
        'batch',
        'tgl_expired',
        'harga',
        'jumlah',
        'diskon',
        'sub_total'
    ];
}
