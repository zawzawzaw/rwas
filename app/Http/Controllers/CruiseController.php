<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Cabin;

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
            "cruise_id" => "SQ03170625",
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
            "cruise_id" => "SQ02170628",
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
            "cruise_id" => "SQ02171013",
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
            "cruise_id" => "SQ03171015",
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
            "cruise_id" => "SR02170628",
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
            "cruise_id" => "SR01170630",
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
            "cruise_id" => "SR01170701",
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
            "cruise_id" => "SQ03170625",
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
            "cruise_id" => "SQ02170628",
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
            "cruise_id" => "SQ02171013",
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
            "cruise_id" => "SQ03171015",
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
      $list = Cabin::query();
      $list->select('departure_date', 'departure_port');
      $list->where('cabin_available', '>', 0);
      $list->groupBy('itinerary_code');
      $list->orderBy('departure_date', 'ASC');
      $list = $list->get();
      return response()->json($list);
  }

  // return a max of 10 itineraries

  // if user is logged in
  // get user home country
  // get a list of unique (iten_code + ship code) items
  // show only iten who's departure port same as user's country


  public function get_home_itineraries()
  {
    $output_data = array(

      array(
        "iten_code" => "03N TWKEL-TWKEL",
        "iten_name" => "4 Days 3 Nights Keelung",
        "ship_code" => "SSQ",
      ),
      array(
        "iten_code" => "02N MYPEN-MYPEN",
        "iten_name" => "3 Days 2 Nights Antwerp",
        "ship_code" => "SSR",
      ),
      array(
        "iten_code" => "03N TWKEL-TWKEL",
        "iten_name" => "4 Days 3 Nights Keelung",
        "ship_code" => "SSQ",
      ),

    );

    $output_json = json_encode($output_data);

    return $output_json;
  }

  



  // return a max of 10 itineraries

  // get a list of unique (iten_code + ship code) items
  // 
  // sort
  // by date of departure
  // we will have a CMS to 'curate' or choose which itinerary will display first on a non-logged in user
  
  
  public function get_home_itineraries_nonmember()
  {
    $output_data = array(
      array(
        "iten_code" => "03N TWKEL-TWKEL",
        "iten_name" => "4 Days 3 Nights Keelung",
        "ship_code" => "SSQ",
      ),
      array(
        "iten_code" => "02N MYPEN-MYPEN",
        "iten_name" => "3 Days 2 Nights Antwerp",
        "ship_code" => "SSR",
      ),
      array(
        "iten_code" => "03N TWKEL-TWKEL",
        "iten_name" => "4 Days 3 Nights Keelung",
        "ship_code" => "SSQ",
      ),
    );

    $output_json = json_encode($output_data);

    return $output_json;
  }






  // for pax 1, it won't have cc_cash_added or gp_cash_added
  
  public function get_best_redeemable_cruise()
  {
    $output_data = array(
      
      "iten_code" => "03N TWKEL-TWKEL",
      "iten_name" => "4 Days 3 Nights Keelung",
      "ship_code" => "SSQ",

      "cruise_id" => "SQ03170625",
      "departure_date" => "06/25/2017",
      "cheapest_cabin" => array(
        "cc" => 5,
        "gp" => 100,
        "cash" => 100,
      ),
    );

    $output_json = json_encode($output_data);

    return $output_json;
  }




  // parameter = cruise_id
  // get (iten_code, ship, pax) from table of unique itineraries
  // get price using (iten_code, ship, pax) and the xtopia parsed csv
  // arrange from lowest full cash price to highest
  
  public function get_cabin_prices()
  {
    $output_data = array(
      array(
        "cabin_type_code" => "CB",                  // get the corresponding name in front end static variables (in english,traditional chinese & simplified chinese)
        "price" => array(
          "cc" => 5,
          "cc_cash_added" => 0,
          "gp" => 100,
          "gp_cash_added" => 0,
          "cash" => 100,
        ),
      ),

      array(
        "cabin_type_code" => "CA",
        "price" => array(
          "cc" => 6,
          "cc_cash_added" => 0,
          "gp" => 120,
          "gp_cash_added" => 0,
          "cash" => 120,
        ),
      ),

      array(
        "cabin_type_code" => "BA",
        "price" => array(
          "cc" => 7,
          "cc_cash_added" => 0,
          "gp" => 140,
          "gp_cash_added" => 0,
          "cash" => 140,
        ),
      ),

      array(
        "cabin_type_code" => "AC",
        "price" => array(
          "cc" => 9,
          "cc_cash_added" => 0,
          "gp" => 180,
          "gp_cash_added" => 0,
          "cash" => 180,
        ),
      ),

      array(
        "cabin_type_code" => "AB",
        "price" => array(
          "cc" => 10,
          "cc_cash_added" => 0,
          "gp" => 200,
          "gp_cash_added" => 0,
          "cash" => 200,
        ),
      ),

    );

    $output_json = json_encode($output_data);

    return $output_json;
  }






  // used in the home page

  
  public function get_home_cruise_details()
  {
    $output_data = array(

      "event_content" => array(

      ),
      "additional_content" => array(
        
      ),
      "itinerary_content" => array(
        
      ),
    );

    $output_json = json_encode($output_data);

    return $output_json;
  }

}
