<?php

namespace App\Models\Master;

use App\Models\KodeTrait;
use App\Models\Regency;
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
        'regencies_id',
        'keterangan',
    ];

    public function regencies()
    {
        return $this->belongsTo(Regency::class, 'regencies_id');
    }
}
