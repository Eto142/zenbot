<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    use HasFactory;
    protected $table = 'admin_details';

    protected $fillable = [
        'user_id',
        'trc',
        'trcImage',
        'btc',
        'btcImage',
        'bank_name',
        'account_name',
        'account_no',
        'routing_no',
        'bank_address',
        'home_address',

        
        
    ];
}
