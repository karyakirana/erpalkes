<?php

namespace App\Models\Akuntansi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkunKategori extends Model
{
    use HasFactory;
    protected $table = 'akun_kategori';
    public $timestamps = false;
    protected $fillable = [
        'kode',
        'nama',
        'keterangan'
    ];
}
