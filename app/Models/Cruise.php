<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cruise extends Model
{
    protected $table = 'cruise';
    protected $fillable = [
        'ship_code',
        'departure_date',
        'cruise_id',
        'week_day', 
        'sector',
        'day',
        'night',
        'itenerary_name',
        'itinerary_code',
        'departure_port',
        'arrival_port'
    ];
}
