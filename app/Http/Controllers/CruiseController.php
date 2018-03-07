<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\Cabin;
use App\Models\Cruise;
use App\Models\Itinerary;

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

    public function get_itineraries(Request $request)
    {
        $list = Itinerary::query();
        $list->select('id', DB::raw('itin_code as iten_code'), DB::raw('itin_name as iten_name'), 'ship_code');
        
        $list->with(['cruise' => function($query) use ($request){ 
            $query->select('id', 'itinerary', 'cruise_id', 'departure_date', DB::raw('DATE_FORMAT(departure_date, "%m/%Y") as filterDate'));
            if(is_null($request->input('date'))==false){
                $query->whereRaw("DATE_FORMAT(departure_date, '%m/%Y')='".$request->input('date')."'");
            }
            $query->orderBy('departure_date', 'ASC');
        }]);

        $list->whereHas('cruise', function($query) use ($request){
            if(is_null($request->input('date'))==false){
                $query->whereRaw("DATE_FORMAT(departure_date, '%m/%Y')='".$request->input('date')."'");
            }
        });
        
        if(is_null($request->input('port'))===false) {
            $list->where('departure_port', $request->input('port'));
        }

        $list = $list->paginate(6)->toArray();
        $res = [];
        
        foreach($list['data'] as $fl){
            $cruise = [];
            foreach($fl['cruise'] as $cur) {
                $cruise[] = [
                    'cruise_id' => $cur['cruise_id'],
                    'departure_date' => date("d/m/Y", strtotime($cur['departure_date'])),
                    "cheapest_cabin" => array(
                        "cc" => 5,
                        "cc_cash_added" => 0,
                        "gp" => 100,
                        "gp_cash_added" => 0,
                        "cash" => 100,
                    ),
                ];
            }
            // if(!empty())
            $res[] = [
                'iten_code' => $fl['iten_code'],
                'iten_name' => $fl['iten_name'],
                'ship_code' => $fl['ship_code'],
                'cruise_array' => $cruise,
            ];
        }
        return response()->json([
            'pagination' => [
                'to' => (int) $list['to'],
                'from' => (int) $list['from'],
                'total' => (int) $list['total'],
                'page' => (int) $list['current_page']
            ],
            'data' => $res
        ]);
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
        $list = Cruise::query();
        $list->select(DB::raw('DATE_FORMAT(cruise.departure_date, "%m/%Y") as mon_year'), DB::raw('itinerary.departure_port as port'));
        $list->leftJoin('itinerary', 'itinerary.id', '=', 'cruise.itinerary');
        $list->distinct();
        $list->whereHas('cabins', function($query){
            $query->where('cabin_available', '>', 0);
        });
        $list->groupBy('itinerary.itin_code', 'mon_year');
        $list->orderBy('cruise.departure_date', 'ASC');
        $list = $list->get()->toArray();
        return response()->json($list);
    }

    // return a max of 10 itineraries

    // if user is logged in
    // get user home country
    // get a list of unique (iten_code + ship code) items
    // show only iten who's departure port same as user's country


    public function get_home_itineraries()
    {
        $list = Itinerary::query();
        $list->select(DB::raw('itin_code as iten_code'), DB::raw('itin_name as iten_name'), 'ship_code');
        $list = $list->paginate(10)->toArray();
        return response()->json([
            'pagination' => [
                'to' => $list['to'],
                'from' => $list['from'],
                'total' => $list['total']
            ],
            'data' => $list['data']
        ]);
    }

  



    // return a max of 10 itineraries

    // get a list of unique (iten_code + ship code) items
    // 
    // sort
    // by date of departure
    // we will have a CMS to 'curate' or choose which itinerary will display first on a non-logged in user
    
    
    public function get_home_itineraries_nonmember()
    {
        $list = Itinerary::query();
        $list->select(DB::raw('itin_code as iten_code'), DB::raw('itin_name as iten_name'), 'ship_code');
        $list = $list->paginate(10)->toArray();
        return response()->json([
            'pagination' => [
                'to' => $list['to'],
                'from' => $list['from'],
                'total' => $list['total']
            ],
            'data' => $list['data']
        ]);
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
    
    public function get_cabin_prices(Request $request)
    {
        if(empty($request->input('cruise_id')) || is_null($request->input('cruise_id'))){
            return response()->json([
                'mesg' => 'Cruise id is required!'
            ], 422);
        }

        $cruise = Cruise::select('id')->where('cruise_id', $request->input('cruise_id'))->with([
            'cabins' => function($query) {
                $query->select('id', 'cabin_category', 'cruise', 'pax_count');
            }
        ])->first();

        if(empty($cruise)){
            return response()->json([
                'mesg' => 'Invalid cruise id!'
            ], 422);
        }
        
        $cabins = [];
        
        foreach($cruise->cabins as $cabin){
            $cabins[] = [
                'cabin_type_code' => $cabin->cabin_category,
                'price' => array(
                    'cc' => 5,
                    'cc_cash_added' => 0,
                    'gp' => 100,
                    'gp_cash_added' => 0,
                    'cash' => 100
                ),
            ];
        }

        return response()->json($cabins);
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
