<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CabinPrice extends Model
{
    protected $table = 'cabin_price';
    
    protected $fillable = [
        'card_type',
        'pax_type_code',
        'gp',
        'rwcc',
        'exec_pax',
        'holiday_charge',
        'promo_code'
    ];
}
