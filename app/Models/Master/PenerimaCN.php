<?php

namespace App\Models\master;

use App\Models\KodeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PenerimaCN extends Model
{
    use HasFactory;
    use CustomerModelTrait;
    use KodeTrait;

    protected $table = 'penerima_cn';
    protected $fillable = [
        'kode',
        'customer_id',
        'jabatan_cn',
        'unit_cn',
        'keterangan'
    ];
}
