<?php

namespace App\Models\Penjualan;

use App\Models\Akuntansi\PenerimaanPenjualanDetail;
use App\Models\Akuntansi\PenjualanDimuka;
use App\Models\Akuntansi\PiutangPenjualan;
use App\Models\KodeTrait;
use App\Models\Master\CustomerModelTrait;
use App\Models\Master\Pegawai;
use App\Models\Master\PegawaiSalesArea;
use App\Models\Persediaan\PersediaanKeluar;
use App\Models\Stock\StockKeluar;
use App\Models\Stock\StockKeluarModelTrait;
use App\Models\UsersModelTrait;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    use UsersModelTrait;
    use CustomerModelTrait;
    use StockKeluarModelTrait;
    use KodeTrait;

    protected $table = 'penjualan';
    protected $fillable = [
        'penjualan_preorder_id',
        'tgl_penjualan',
        'tempo',
        'tgl_tempo',
        'active_cash',
        'kode',
        'tipe', // non-kso, kso, kso-alat
        'nomor_kso',
        'customer_id',
        'sales_id',
        'user_id',
        'status', // belum or kurang or lunas
        'total_barang',
        'total_ppn',
        'total_biaya_lain',
        'total_bayar',
        'keterangan',
        'print'
    ];

    public function tglPenjualan():Attribute
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

    public function penjualanDetail()
    {
        return $this->hasMany(PenjualanDetail::class, 'penjualan_id');
    }

    public function persediaanKeluar()
    {
        return $this->morphOne(PersediaanKeluar::class, 'persediaanableKeluar', 'persediaanable_keluar_type', 'persediaanable_keluar_id');
    }

    public function penerimaanPenjualanDetail()
    {
        return $this->hasMany(PenerimaanPenjualanDetail::class, 'penjualan_id');
    }

    public function piutangPenjualan()
    {
        return $this->morphOne(PiutangPenjualan::class, 'piutangable_penjualan', 'piutangable_penjualan_type', 'piutangable_penjualan_id');
    }

    public function penjualanDimuka()
    {
        return $this->hasOne(PenjualanDimuka::class, 'penjualan_id');
    }

    public function sales()
    {
        return $this->belongsTo(PegawaiSalesArea::class, 'sales_id');
    }
}
