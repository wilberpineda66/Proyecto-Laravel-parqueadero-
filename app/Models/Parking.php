<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parking extends Model
{
    protected $fillable = [
        'name',
        'latitude',
        'longitude',
        'available_spaces',
        'price_per_hour',
        'type',
    ];
}
