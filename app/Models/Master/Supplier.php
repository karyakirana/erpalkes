<?php

namespace App\Models\Master;

use App\Models\KodeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;
    use KodeTrait;

    protected $table = 'supplier';
    protected $fillable = [
        'kode',
        'nama_supplier',
        'telepon',
        'email',
        'npwp',
        'alamat',
        'keterangan',
    ];
}
