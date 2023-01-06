<?php

namespace App\Models\Stock;

use App\Models\KodeTrait;
use App\Models\Master\CustomerModelTrait;
use App\Models\Master\SupplierModelTrait;
use App\Models\UsersModelTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockMasuk extends Model
{
    use HasFactory, KodeTrait, CustomerModelTrait, SupplierModelTrait, UsersModelTrait;
    protected $table = 'stock_masuk';
    protected $fillable = [
        'stockable_masuk_id',
        'stockable_masuk_type',
        'tgl_masuk',
        'active_cash',
        'kode',
        'kondisi',
        'status',
        'gudang_id',
        'customer_id',
        'supplier_id',
        'user_id',
        'total_barang',
        'keterangan'
    ];

    public function tglMasuk():Attribute
    {
        return Attribute::make(
            get: fn($value) => tanggalan_format($value),
            set: fn($value) => tanggalan_database_format($value, 'd-M-Y')
        );
    }

    public function stockMasukDetail()
    {
        return $this->hasMany(StockMasukDetail::class, 'stock_masuk_id');
    }

    public function stockableMasuk()
    {
        return $this->morphTo(__FUNCTION__, 'stockable_masuk_type', 'stockable_masuk_id');
    }
}
