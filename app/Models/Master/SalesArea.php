<?php

namespace App\Models\Master;

use App\Models\KodeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesArea extends Model
{
    use HasFactory;

    protected $table = 'sales_area';
    protected $fillable = [
        'kode_area',
        'nama_area',
        'keterangan',
    ];

    public function getLastNumMasterAttribute()
    {
        return substr($this->kode_area, 1, 5);
    }

    public function salesAreaDetail()
    {
        return $this->hasMany(SalesAreaDetail::class, 'sales_area_id');
    }

    public function salesAreaSet()
    {
        return $this->hasMany(SalesAreaSet::class, 'sales_area_id');
    }
}
