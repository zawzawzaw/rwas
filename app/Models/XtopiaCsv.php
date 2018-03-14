<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class XtopiaCsv extends Model
{
    protected $table = 'xtopia';

    protected $fillable = [
        'itinerary_code',
        'card_type',
        'cabin_code',
        'pax_type_code',
        'gp',
        'rwcc',
        'exec_pax',
        'holiday_charge',
        'ship_code',
        'promo_code',
        'dep_start',
        'dep_end'
    ];
}
