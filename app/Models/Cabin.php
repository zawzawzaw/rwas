<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cabin extends Model
{  
    protected $table = 'cabins';      

    protected $fillable = [
        'cruise',
        'cabin_category',
        'cabin_group',
        'cabin_blocked',
        'cabin_sold',
        'cabin_available',
        'pax_count'
    ];

}
