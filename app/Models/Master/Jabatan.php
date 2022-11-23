<?php

namespace App\Models\Master;

use App\Models\KodeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    use HasFactory;
    use KodeTrait;

    protected $table = 'jabatan';
    protected $fillable = [
        'kode',
        'nama_jabatan',
        'keterangan',
    ];
}
