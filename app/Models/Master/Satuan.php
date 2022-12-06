<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Satuan extends Model
{
    use HasFactory;
    protected $table = 'satuan';
    protected $fillable = [
        'kemasan_id',
        'satuan'
    ];

    public function kemasan()
    {
        return $this->belongsTo(Kemasan::class, 'kemasan_id');
    }
}
