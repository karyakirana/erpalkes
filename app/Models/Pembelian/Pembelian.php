<?php

namespace App\Models\Pembelian;

use App\Models\Master\SupplierModelTrait;
use App\Models\Stock\StockMasukModelTrait;
use App\Models\UsersModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    use UsersModelTrait;
    use SupplierModelTrait;
    use StockMasukModelTrait;

    protected $table = 'pembelian';
    protected $fillable = [
        'active_cash',
        'kode',
        'pembelian_po_id',
        'supplier_id',
        'user_id',
        'jenis_pembelian',
        'status_pembelian',
        'tgl_nota',
        'tgl_tempo',
        'total_barang',
        'total_ppn',
        'total_biaya_lain',
        'total_bayar',
        'keterangan',
        'print'
    ];

    public function pembelianDetail()
    {
        return $this->hasMany(PembelianDetail::class, 'pembelian_id');
    }

}
