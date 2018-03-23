<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CabinData extends Model
{
    protected $table = 'cabindata';

    protected $fillable = [
        "cabin_code",
        "cabin_type",
        "cabin_type_en",
        "cabin_type_zh_hans",
        "cabin_type_zh_hant",
        "key",
        "ship_code"
    ];
}
