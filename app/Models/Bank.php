<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
    use HasFactory;
    protected $table = 'bank_details';

    protected $fillable = [
        'bank_name',
        'account_name',
        'account_no',
        'routing_no',
        'bank_address',
        'home_address',

        
        
    ];
}
