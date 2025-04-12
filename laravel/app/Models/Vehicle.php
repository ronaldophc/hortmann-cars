<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'model',
        'manufacturer',
        'fuel_type',
        'steering_type',
        'transmission',
        'doors',
        'year',
        'current_km',
        'price',
        'license_plate',
        'description'
    ];

}
