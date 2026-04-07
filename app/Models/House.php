<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\HouseImage;
use App\Models\Country;

class House extends Model
{
    use HasFactory;
    protected $table = 'houses';
    protected $fillable = [
        'slug',
        'state',
        'address',
        'description',
        'square',
        'bath',
        'bed',
        'original_price',
        'selling_price',
        'rating',
        'trending',
        'status'

    ];

    public function country()
    {
       return $this->belongsTo(Country::class, 'country_id','id');
    }
    public function houseImages()
    {
       return $this->hasMany(HouseImage::class, 'house_id','id');
    }
}
