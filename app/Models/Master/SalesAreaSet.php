<?php

namespace App\Models\Master;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesAreaSet extends Model
{
    use HasFactory;
    protected $table = 'sales_area_set';
    protected $fillable = [
        'pegawai_id',
        'sales_area_id'
    ];

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'pegawai_id');
    }

    public function salesArea()
    {
        return $this->belongsTo(SalesArea::class, 'sales_area_id');
    }
}
