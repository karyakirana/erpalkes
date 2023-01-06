<?php

namespace App\Models\Pembelian;

use App\Models\KodeTrait;
use App\Models\Master\Gudang;
use App\Models\Master\SupplierModelTrait;
use App\Models\Stock\StockMasukModelTrait;
use App\Models\UsersModelTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    use UsersModelTrait;
    use SupplierModelTrait;
    use StockMasukModelTrait;
    use KodeTrait;

    protected $fillable = [
        'pembelian_po_id',
        'tgl_nota',
        'tempo',
        'tgl_tempo',
        'active_cash',
        'kode',
        'gudang_id',
        'supplier_id',
        'user_id',
        'status',
        'total_barang',
        'ppn',
        'biaya_lain',
        'total_bayar',
        'keterangan',
    ];

    protected $table = 'pembelian';

    public function tglnota():Attribute
    {
        return Attribute::make(
            get: fn($value) => tanggalan_format($value),
            set: fn($value) => tanggalan_database_format($value, 'd-M-Y')
        );
    }

    public function tglTempo():Attribute
    {
        return Attribute::make(
            get: fn($value) => tanggalan_format($value),
            set: fn($value) => tanggalan_database_format($value, 'd-M-Y')
        );
    }

    public function pembelianDetail()
    {
        return $this->hasMany(PembelianDetail::class, 'pembelian_id');
    }

    public function pembelianPreorder()
    {
        return $this->belongsTo(PembelianPO::class, 'pembelian_po_id');
    }

    public function gudang()
    {
        return $this->belongsTo(Gudang::class, 'gudang_id');
    }

}
