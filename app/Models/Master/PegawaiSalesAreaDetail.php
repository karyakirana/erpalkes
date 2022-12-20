<?php

namespace App\Models\Master;

use App\Models\Regency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiSalesAreaDetail extends Model
{
    use HasFactory;
    protected $table = 'pegawai_sales_area_detail';
    public $timestamps = false;
    protected $fillable = [
        'pegawai_sales_area_id',
        'kota_id'
    ];

    public function pegawaiSalesArea()
    {
        return $this->belongsTo(PegawaiSalesArea::class, 'pegawai_sales_area_id');
    }

    public function kota()
    {
        return $this->belongsTo(Regency::class, 'kota_id');
    }
}
