<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'latitude',
        'longitude',
        'type',
        'status',
        'price',
        'year',
        'contract',
        'user_id',
        'area',
        'roos',
        'bedrooms',
        'bathrooms',
        'garages',
        'parkings',
        'air_condition',
        'laundry',
        'refrigerator',
        'washer',
        'barbeque',
        'lawn',
        'sauna',
        'wifi',
        'dryer',
        'microwave',
        'swimming_pool',
        'window_covering',
        'gym',
        'outdoor_shower',
        'tv_cable',
        'villa',
        'images'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class,'property_id','id');
    }
}
