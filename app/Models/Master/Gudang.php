<?php

namespace App\Models\Master;

use App\Models\KodeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gudang extends Model
{
    use HasFactory, KodeTrait;
    protected $table = 'lokasi';
    protected $fillable = [
        'kode',
        'nama',
        'keterangan'
    ];
}
