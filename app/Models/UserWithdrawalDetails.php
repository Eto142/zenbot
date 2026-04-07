<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWithdrawalDetails extends Model
{
    use HasFactory;
    protected $table = 'user_withdrawal_details';

    protected $fillable = [
        'user_id',
        'btc_address',
        'usdt_address',
        
    ];
}
