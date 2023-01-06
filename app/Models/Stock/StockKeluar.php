<?php

namespace App\Models\Stock;

use App\Models\KodeTrait;
use App\Models\Master\CustomerModelTrait;
use App\Models\Master\SupplierModelTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockKeluar extends Model
{
    use HasFactory, KodeTrait, CustomerModelTrait, SupplierModelTrait;
    protected $table = 'stock_keluar';
    protected $fillable = [
        'stockable_keluar_id',
        'stockable_keluar_type',
        'tgl_keluar',
        'kondisi',
        'customer_id',
        'supplier_id',
        'active_cash',
        'kode',
        'status',
        'gudang_id',
        'user_id',
        'total_barang',
        'keterangan'
    ];

    public function tglKeluar():Attribute
    {
        return Attribute::make(
            get: fn($value) => tanggalan_format($value),
            set: fn($value) => tanggalan_database_format($value, 'd-M-Y')
        );
    }

    public function stockKeluarDetail()
    {
        return $this->hasMany(StockKeluarDetail::class, 'stock_keluar_id');
    }

    public function stockableKeluar()
    {
        return $this->morphTo(__FUNCTION__, 'stockable_keluar_type', 'stockable_keluar_id');
    }
}
