<?php

namespace App\Models\Master;

use App\Models\KodeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    use AreaModelTrait;
    use KodeTrait;

    protected $table = 'customer';
    protected $fillable = [
        'kode',
        'jenis_instansi',
        'area_id',
        'nama_customer',
        'telepon',
        'email',
        'npwp',
        'alamat',
        'regencies_id',
        'diskon',
        'keterangan',
    ];
}
