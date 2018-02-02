<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CruiseController extends Controller
{



  /*

  // parameters
  selected_month_year
  selected_port
  pax
  page_num    (6 itiniraries per page, starts at 1, if not found page = 1)
  


  // sample value
  selected_month_year = 06/2017
  is June 2017

  selected_port = TWKEL
  in all caps

  pax

  A = adult
  C = child
  J = infant

  input in all caps, possible combinations are
  
  A
  AA
  AC
  AJ
  AAA
  AAC
  AAJ
  ACC
  ACJ
  AJJ
  AAAA
  AAAC
  AAAJ
  AACC
  AACJ
  AAJJ
  ACCC
  ACCJ
  ACJJ
  AJJJ
  
  // Output
  itenerary 01
     cruise date 01
       - date
       - price of the cheapest cabin available (inventory != 0)
         
         cc = cruise credit price
         cc_cash_added = cash added to cruise credit price (when 3-4 pax)
         gp = genting point price
         gp_cash_added = cash added to genting point price (when 3-4 pax)
         cash = full cash price

     cruise date 02
     cruise date 03
  itenerary 02
     cruise date 01
     cruise date 02
     cruise date 03
  itenerary 03
     cruise date 01
     cruise date 02
     cruise date 03

  



  // Where to get the data

  1. table of unique itineraries (create every 75 mins)
  2. parsed seaware csv
     - get dates for itineraries for that page
  3. parsed xtopia csv
     - using iten_code + ship code + cabin codes
     - get the lowest cabin price

  */

  public function get_itineraries()
  {
      
    $output_data = array(
      
      // itenerary 01
      
      array(
        "iten_code" => "03N TWKEL-TWKEL",
        "iten_name" => "4 Days 3 Nights Keelung",
        "ship_code" => "SSQ",
        "cruise_array" => array(
          array(
            "departure_date" => "06/25/2017",
            "cheapest_cabin" => array(
              "cc" => 5,
              "cc_cash_added" => 0,
              "gp" => 100,
              "gp_cash_added" => 0,
              "cash" => 100,
            ),
          ),
          array(
            "departure_date" => "06/28/2017",
            "cheapest_cabin" => array(
              "cc" => 5,
              "cc_cash_added" => 0,
              "gp" => 100,
              "gp_cash_added" => 0,
              "cash" => 100,
            ),
          ),
          array(
            "departure_date" => "10/13/2017",
            "cheapest_cabin" => array(
              "cc" => 5,
              "cc_cash_added" => 0,
              "gp" => 100,
              "gp_cash_added" => 0,
              "cash" => 100,
            ),
          ),
          array(
            "departure_date" => "10/15/2017",
            "cheapest_cabin" => array(
              "cc" => 5,
              "cc_cash_added" => 0,
              "gp" => 100,
              "gp_cash_added" => 0,
              "cash" => 100,
            ),
          ),

        ),
      ),

      // itenerary 02

      array(
        "iten_code" => "02N MYPEN-MYPEN",
        "iten_name" => "3 Days 2 Nights Antwerp",
        "ship_code" => "SSR",
        "cruise_array" => array(
          array(
            "departure_date" => "06/28/2017",
            "cheapest_cabin" => array(
              "cc" => 5,
              "cc_cash_added" => 0,
              "gp" => 100,
              "gp_cash_added" => 0,
              "cash" => 100,
            ),
          ),
          array(
            "departure_date" => "06/30/2017",
            "cheapest_cabin" => array(
              "cc" => 5,
              "cc_cash_added" => 0,
              "gp" => 100,
              "gp_cash_added" => 0,
              "cash" => 100,
            ),
          ),
          array(
            "departure_date" => "07/01/2017",
            "cheapest_cabin" => array(
              "cc" => 5,
              "cc_cash_added" => 0,
              "gp" => 100,
              "gp_cash_added" => 0,
              "cash" => 100,
            ),
          ),

        ),
      ),

      // itenerary 03

      array(
        "iten_code" => "03N TWKEL-TWKEL",
        "iten_name" => "4 Days 3 Nights Keelung",
        "ship_code" => "SSQ",
        "cruise_array" => array(
          array(
            "departure_date" => "06/25/2017",
            "cheapest_cabin" => array(
              "cc" => 5,
              "cc_cash_added" => 0,
              "gp" => 100,
              "gp_cash_added" => 0,
              "cash" => 100,
            ),
          ),
          array(
            "departure_date" => "06/28/2017",
            "cheapest_cabin" => array(
              "cc" => 5,
              "cc_cash_added" => 0,
              "gp" => 100,
              "gp_cash_added" => 0,
              "cash" => 100,
            ),
          ),
          array(
            "departure_date" => "10/13/2017",
            "cheapest_cabin" => array(
              "cc" => 5,
              "cc_cash_added" => 0,
              "gp" => 100,
              "gp_cash_added" => 0,
              "cash" => 100,
            ),
          ),
          array(
            "departure_date" => "10/15/2017",
            "cheapest_cabin" => array(
              "cc" => 5,
              "cc_cash_added" => 0,
              "gp" => 100,
              "gp_cash_added" => 0,
              "cash" => 100,
            ),
          ),

        ),
      ),


    );

    $output_json = json_encode($output_data);

    return $output_json;
  }




  /*

  We are using this to prevent negative search results

  using a list of unique CRUISE ID (ex 'SQ03170625') generate a list of departure port codes & month/year value

  remove duplicates (some cruises will have the same departure port and month/year combinations)
  
  * itinerary must have at least 1 cabin with inventory left !
  

  // Where to get the data

  1. parsed seaware csv
  
  */

  
  public function get_valid_search_parameters()
  {
    $output_data = array(
      array(
        "port" => "TWKEL",
        "mon_year" => "06/2017",
      ),
      array(
        "port" => "TWKEL",
        "mon_year" => "10/2017",
      ),
      array(
        "port" => "MYPEN",
        "mon_year" => "06/2017",
      ),
      array(
        "port" => "MYPEN",
        "mon_year" => "07/2017",
      ),
      array(
        "port" => "TWKEL",
        "mon_year" => "08/2017",
      ),
      array(
        "port" => "SGSIN",
        "mon_year" => "09/2017",
      ),
      array(
        "port" => "MYPEN",
        "mon_year" => "11/2017",
      ),
      array(
        "port" => "MYPEN",
        "mon_year" => "05/2017",
      ),
      array(
        "port" => "SGSIN",
        "mon_year" => "10/2017",
      ),
      array(
        "port" => "CNNSA",
        "mon_year" => "08/2017",
      ),
      array(
        "port" => "CNNSA",
        "mon_year" => "09/2017",
      ),
      array(
        "port" => "CNSHA",
        "mon_year" => "07/2017",
      ),
      array(
        "port" => "JPOSA",
        "mon_year" => "09/2017",
      ),


      // and so on and so forth ...

    );

    $output_json = json_encode($output_data);

    return $output_json;
  }

  




  public function get_home_itineraries()
  {
    $output_data = array(
      
    );

    $output_json = json_encode($output_data);

    return $output_json;
  }

  
  public function get_home_itineraries_nonmember()
  {
    $output_data = array(
      
    );

    $output_json = json_encode($output_data);

    return $output_json;
  }

  
  public function get_best_redeemable_cruise()
  {
    $output_data = array(
      
    );

    $output_json = json_encode($output_data);

    return $output_json;
  }

  
  public function get_cabin_prices()
  {
    $output_data = array(
      
    );

    $output_json = json_encode($output_data);

    return $output_json;
  }






  // used in the home page

  
  public function get_home_cruise_details()
  {
    $output_data = array(
      
    );

    $output_json = json_encode($output_data);

    return $output_json;
  }

}
