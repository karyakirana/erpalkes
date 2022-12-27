<?php

namespace App\Models\Akuntansi;

use App\Models\KodeTrait;
use App\Models\Master\SupplierModelTrait;
use App\Models\UsersModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PengeluaranPembelian extends Model
{
    use HasFactory, KodeTrait, SupplierModelTrait, UsersModelTrait;
    protected $table = 'pengeluaran_pembelian';
    protected $fillable = [
        'active_cash',
        'kode',
        'tgl_pengeluaran',
        'supplier_id',
        'user_id',
        'total_pengeluaran',
        'keterangan'
    ];

    public function pengeluaranPembelianDetail()
    {
        return $this->hasMany(PengeluaranPembelianDetail::class, 'pengeluaran_pembelian_id');
    }

    public function paymenPembelian()
    {
        return $this->hasMany(PaymentPembelian::class, 'pengeluaran_pembelian_id');
    }
}
