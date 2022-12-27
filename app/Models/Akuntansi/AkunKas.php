<?php

namespace App\Models\Akuntansi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkunKas extends Model
{
    use HasFactory;
    protected $table = 'akun_kas';
    public $timestamps = false;
    protected $fillable = [
        'akun_id',
        'nama',
        'keterangan'
    ];

    public function akun()
    {
        return $this->belongsTo(Akun::class, 'akun_id');
    }
}
