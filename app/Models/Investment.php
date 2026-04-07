<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Investment extends Model
{
    use HasFactory;
    protected $table = 'investments';

    protected $fillable = [
        'user_id',
        'amount',
        'plan_name',
        'plan_percentage',
        'plan_duration',
        'status',
        'plan_start',
        'plan_end',
        
    ];
}
       