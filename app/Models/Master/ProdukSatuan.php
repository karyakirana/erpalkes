<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukSatuan extends Model
{
    use HasFactory;
    protected $table = 'produk_satuan';
    public $timestamps = false;
    protected $fillable = [
        'satuan'
    ];
}
