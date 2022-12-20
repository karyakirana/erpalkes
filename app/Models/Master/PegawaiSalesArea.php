<?php

namespace App\Models\Master;

use App\Models\KodeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiSalesArea extends Model
{
    use HasFactory, KodeTrait;
    protected $table = 'pegawai_sales_area';
    public $timestamps = false;
    protected $fillable = [
        'kode',
        'pegawai_id',
        'nama',
    ];

    public function pegawaiSalesAreaDetail()
    {
        return $this->hasMany(PegawaiSalesAreaDetail::class, 'pegawai_sales_area_id');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }
}
