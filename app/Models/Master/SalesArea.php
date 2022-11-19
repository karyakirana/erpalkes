<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesArea extends Model
{
    use HasFactory;
    protected $table = 'sales_area';
    protected $fillable = [
        'kode_area',
        'nama_area',
        'keterangan',
    ];
}
