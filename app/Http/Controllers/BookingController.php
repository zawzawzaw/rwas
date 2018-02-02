<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookingController extends Controller
{


  public function book_cruise()
  {

    return 'success';
  }
  
  public function get_booking_details()
  {
    
    $output_data = array(
      
    );

    $output_json = json_encode($output_data);

    return $output_json;
  }

}
