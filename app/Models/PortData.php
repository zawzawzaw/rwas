<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortData extends Model
{
    protected $table = 'portdata';

    protected $fillable = [
        'country',
        'en',
        'location_code',
        'zh-Hans',
        'zh-Hant'
    ];
}
