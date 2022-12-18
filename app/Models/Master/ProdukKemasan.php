<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukKemasan extends Model
{
    use HasFactory;
    protected $table = 'produk_kemasan';
    public $timestamps = false;
    protected $fillable = [
        'produk_id',
        'kemasan',
        'isi',
    ];
}
