<?php

namespace App\Models\Master;

use App\Models\KodeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerCN extends Model
{
    use HasFactory;
    use CustomerModelTrait;
    use KodeTrait;

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
