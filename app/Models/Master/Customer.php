<?php

namespace App\Models\Master;

use App\Models\KodeTrait;
use App\Models\Regency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use HasFactory;
    use SoftDeletes;
    use AreaModelTrait;
    use KodeTrait;

    protected $table = 'customer';
    protected $fillable = [
        'kode',
        'status',
        'jenis_instansi',
        'nama_customer',
        'telepon',
        'email',
        'npwp',
        'alamat',
        'regencies_id',
        'diskon',
        'keterangan',
    ];

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'regencies_id');
    }
}
