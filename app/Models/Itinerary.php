<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Itinerary extends Model
{
    protected $table = 'itinerary';
    protected $fillable = [
        'itin_code',
        'itin_name',
        'ship_code',
        'sector',
        'departure_port',
        'arrival_port',
        'day',
        'night'
    ];

    public function cruise()
    {
        return $this->hasMany('App\Models\Cruise', 'itinerary', 'id');
    }
}
