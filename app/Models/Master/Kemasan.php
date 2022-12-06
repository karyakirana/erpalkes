<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kemasan extends Model
{
    use HasFactory;
    protected $table = 'kemasan';
    protected $fillable = [
        'kemasan',
        'isi_kemasan'
    ];

    public function satuan()
    {
        return $this->hasMany(Satuan::class, 'kemasan_id');
    }
}
