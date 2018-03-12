<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cruise extends Model
{
    protected $table = 'cruise';
    protected $fillable = [
        'itinerary',
        'departure_date',
        'departure_date_end',
        'cruise_id',
        'week_day', 
    ];
    
    public function cabins() {
        return $this->hasMany('App\Models\Cabin', 'cruise', 'id');
    }

    public function itinerary() {
        return $this->hasOne('App\Models\Itinerary', 'id', 'itinerary');
    }
}
