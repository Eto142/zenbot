<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Country;

class Country extends Model
{
    use HasFactory;
    protected $table = 'countries';
    protected $fillable = [
        'country',
        'slug',

    ];
    

    public function countryHouse()
    {
       return $this->hasMany(House::class, 'country_id','id');
    }
}
