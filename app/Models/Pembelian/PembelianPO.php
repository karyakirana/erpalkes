<?php

namespace App\Models\Pembelian;

use App\Models\KodeTrait;
use App\Models\Master\SupplierModelTrait;
use App\Models\UsersModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianPO extends Model
{
    use HasFactory;
    use UsersModelTrait;
    use SupplierModelTrait;
    use KodeTrait;

    protected $table = 'pembelian_po';
    protected $fillable = [
        'pembelian_quotation_id',
        'tgl_pembelian_po',
        'tempo',
        'tgl_tempo',
        'active_cash',
        'kode',
        'supplier_id',
        'user_id',
        'status',
        'total_barang',
        'ppn',
        'biaya_lain',
        'total_bayar',
        'keterangan'
    ];

    public function pembelianPoDetail()
    {
        return $this->hasMany(PembelianPODetail::class, 'pembelian_po_id');
    }

    public function pembelian()
    {
        return $this->hasOne(Pembelian::class, 'pembelian_po_id');
    }
}
