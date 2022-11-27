<?php

namespace App\Models\Master;

use App\Models\Regency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesAreaDetail extends Model
{
    use HasFactory;
    protected $table = 'sales_area_detail';
    protected $fillable = [
        'sales_area_id',
        'regencies_id'
    ];

    public function regencies()
    {
        return $this->belongsTo(Regency::class, 'regencies_id');
    }
}
