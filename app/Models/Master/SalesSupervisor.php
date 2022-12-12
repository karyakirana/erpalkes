<?php

namespace App\Models\Master;

use App\Models\KodeTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesSupervisor extends Model
{
    use HasFactory, KodeTrait;
    protected $table = 'sales_and_supervisor';
    protected $fillable = [
        'pegawai_id',
        'area_id'
    ];

    public function area()
    {
        return $this->belongsTo(SalesArea::class, 'area_id');
    }

    public function salesSupervisorDetail()
    {
        return $this->hasMany(SalesSupervisorDetail::class, 'sales_supervisor_id');
    }
}
