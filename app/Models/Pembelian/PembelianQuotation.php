<?php

namespace App\Models\Pembelian;

use App\Models\KodeTrait;
use App\Models\Master\CustomerModelTrait;
use App\Models\UsersModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembelianQuotation extends Model
{
    use HasFactory;
    use CustomerModelTrait;
    use UsersModelTrait;
    use KodeTrait;

    protected $table = 'pembelian_quotation';
    protected $fillable = [
        'active_cash',
        'kode',
        'supplier_id',
        'user_id',
        'status',
        'tgl_pembelian_quotation',
        'total_barang',
        'ppn',
        'biaya_lain',
        'total_bayar',
        'keterangan',
        'print'
    ];

    public function pembelianQuotationDetail()
    {
        return $this->hasMany(PembelianQuotationDetail::class, 'pembelian_quotation_id');
    }
}
