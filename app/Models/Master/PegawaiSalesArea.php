<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PegawaiSalesArea extends Model
{
    use HasFactory;
    protected $table = 'pegawai_sales_area';
    protected $fillable = [
        'kode',
        'pegawai_id',
        'nama',
    ];
}
