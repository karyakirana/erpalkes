<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiSalesAreaDetail extends Model
{
    use HasFactory;
    protected $table = 'pegawai_sales_area_detail';
    protected $fillable = [
        'pegawai_sales_area_id',
        'kota_id'
    ];
}
