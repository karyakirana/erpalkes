<?php

namespace App\Models\Master;

use App\Models\KodeTrait;
use App\Models\Regency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use HasFactory;
    use KodeTrait, SoftDeletes;

    protected $table = 'supplier';
    protected $fillable = [
        'kode',
        'status',
        'nama',
        'telepon',
        'email',
        'npwp',
        'alamat',
        'regencies_id',
        'keterangan',
    ];

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'regencies_id');
    }
}
