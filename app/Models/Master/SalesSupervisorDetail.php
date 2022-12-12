<?php

namespace App\Models\Master;

use App\Models\Regency;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalesSupervisorDetail extends Model
{
    use HasFactory;
    protected $table = 'sales_and_supervisor_detail';
    protected $fillable = [
        'sales_supervisor_id',
        'sales_id',
        'kota'
    ];

    public function salesSupervisor()
    {
        return $this->belongsTo(SalesSupervisor::class, 'sales_supervisor_id');
    }

    public function pegawai()
    {
        return $this->belongsTo(Pegawai::class, 'sales_id');
    }

    public function regency()
    {
        return $this->belongsTo(Regency::class, 'kota');
    }
}
