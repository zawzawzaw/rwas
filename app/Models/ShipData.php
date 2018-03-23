<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShipData extends Model
{
    protected $table = 'shipdata';

    protected $fillable = [
        'ship_code',
        'ship_code_drs',
        'en',
        'zh-Hans',
        'zh-Hant'
    ];
}
