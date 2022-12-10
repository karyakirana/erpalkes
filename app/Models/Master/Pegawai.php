<?php

namespace App\Models\Master;

use App\Models\KodeTrait;
use App\Models\Regency;
use App\Models\User;
use App\Models\UsersModelTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory;
    use AreaModelTrait;
    use UsersModelTrait;
    use KodeTrait;
    use SoftDeletes;

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
        'regencies_id',
        'keterangan',
    ];

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'jabatan_id');
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'regencies_id');
    }
}
