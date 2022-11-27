<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdukBrosur extends Model
{
    use HasFactory;

    protected $table= 'gambar_brosur';

    protected $fillable = ['folder','image'];
}
