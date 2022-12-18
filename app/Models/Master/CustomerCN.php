<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCN extends Model
{
    use HasFactory;
    use CustomerModelTrait;

    protected $table = 'customer_cn';
    protected $fillable = [
        'kode',
        'customer_id',
        'user_id',
        'penerima_cn',
        'jabatan_cn',
        'unit_cn',
        'keterangan',
    ];
}
