<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Wilgucki\Csv\Traits\CsvImportable;

class Cabin extends Model
{
  use CsvImportable;  
  protected $table = 'cabins';      

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
                          'itinerary_code',
                          'departure_port',
                          'arrival_port'
                        );


    //

}
