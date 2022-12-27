<?php

namespace App\Models\Akuntansi;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AkunTipe extends Model
{
    use HasFactory;
    protected $table = 'akun_tipe';
    public $timestamps = false;
    protected $fillable = [
        'nama',
        'tipe', // debet or kredit
    ];
}
