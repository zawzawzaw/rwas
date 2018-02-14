<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SeawareCsv extends Model
{
    protected $table = 'seaware_csv';
    protected $fillable = array(
        'ship_code',
        'departure_date',
        'cruise_id',
        'week_day', 
        'sector',
        'cabin_category',
        'cabin_group',
        'cabin_blocked',
        'cabin_sold',
        'cabin_available',
        'pax_count',
        'day',
        'night',
        'itenerary_name',
        'itinerary_code',
        'departure_port',
        'arrival_port'
    );
}
