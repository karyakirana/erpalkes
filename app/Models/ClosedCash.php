<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClosedCash extends Model
{
    use HasFactory;
    protected $table = 'closed_cash';
    protected $fillable = [
        'active_cash',
        'closed_cash',
        'started',
        'closed',
        'user_id',
    ];
}
