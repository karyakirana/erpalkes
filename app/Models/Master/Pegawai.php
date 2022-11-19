<?php

namespace App\Models\Master;

use App\Models\User;
use App\Models\UsersModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    use AreaModelTrait;
    use UsersModelTrait;

    protected $table = 'pegawai';
    protected $fillable = [
        'kode',
        'nama_pegawai',
        'gender',
        'telepon',
        'email',
        'npwp',
        'jabatan_id',
        'area_id',
        'keterangan',
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }
}
