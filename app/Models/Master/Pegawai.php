<?php

namespace App\Models\Master;

use App\Models\KodeTrait;
use App\Models\User;
use App\Models\UsersModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    use AreaModelTrait;
    use UsersModelTrait;
    use KodeTrait;

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
        'alamat',
        'keterangan',
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }
}
