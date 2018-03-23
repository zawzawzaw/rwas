<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\Cabin;
use App\Models\Cruise;
use App\Models\Itinerary;
use App\Models\XtopiaCsv;

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

        $cruise = Cruise::select('id', 'itinerary', 'departure_date')->where('cruise_id', $request->input('cruise_id'))->with([
            'cabins' => function($query) {
                $query->select('id', 'cabin_category', 'cruise', 'pax_count');
            },
            'itinerary'
        ])->first();

        if(empty($cruise)){
            return response()->json([
                'mesg' => 'Invalid cruise id!'
            ], 422);
        }

        $cruise = $cruise->toArray();
        
        $cabins = [];
        $ownCC = $this->getCCValue($request, false);
        // return response()->json($cruise);
        $pax = is_null($request->input('pax')) || $request->input('pax')==="" ? 'A' : $request->input('pax');

        $gp = 0;

        foreach($cruise['cabins'] as $cabin){
            $xtopia = DB::select("SELECT * FROM xtopia x WHERE 
                                    x.itinerary_code='".$cruise['itinerary']['itin_code']."' AND 
                                    x.ship_code='".$cruise['itinerary']['ship_code']."' AND 
                                    x.dep_start<='".$cruise['departure_date']."' AND 
                                    x.dep_end>='".$cruise['departure_date']."' AND 
                                    x.cabin_code='".$cabin['cabin_category']."' AND 
                                    x.pax_type_code='$pax' AND 
                                    x.card_type='CLASSIC' LIMIT 3;");
            
            $cc = 0;
            $gp = rand(100, 300);
            $cash = rand(100, 300);

            if(count($xtopia)>0) {
                $cc = $xtopia[0]->rwcc;
                $gp = $xtopia[0]->gp;
            }

            $cabins[] = [
                'cabin_type_code' => $cabin['cabin_category'],
                'price' => array(
                    'cc' => $cc,
                    'cc_cash_added' => 0,
                    'gp' => $gp,
                    'gp_cash_added' => 0,
                    'cash' => $cash,
                    'ownCC' => $ownCC
                ),
                $request->attributes->get('loginuser')
            ];
        }

        return response()->json($cabins);
    }

    public function get_cruise_info_for_cabin(Request $request)
    {
        if(empty($request->input('cruise_id')) || is_null($request->input('cruise_id'))){
            return response()->json([
                'mesg' => 'Cruise id is required!'
            ], 422);
        }
        
        $cruise = Cruise::select('id', 'itinerary', 'departure_date')->with(['itinerary' => function($query) {
            $query->select('id', 'ship_code', 'day', 'night', 'departure_port', 'arrival_port');
        }])->where('cruise_id', $request->input('cruise_id'))->first()->toArray();

        $res = [
            'ship_code' => $cruise['itinerary']['ship_code'],
            'duration' => $cruise['itinerary']['day'].' Days '.$cruise['itinerary']['night'].' Nights',
            'dep_port' => $cruise['itinerary']['departure_port'],
            'arr_port' => $cruise['itinerary']['arrival_port'],
            'dep_date' => date('d M Y', strtotime($cruise['departure_date'])),
            'price' => array(
                'cc' => rand(8, 22),
                'cc_cash_added' => 0,
                'gp' => rand(100, 300),
                'gp_cash_added' => 0,
                'cash' => 100
            ),
        ];

        return response()->json($res);
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

    public function generate_payment_requirement(Request $request)
    {
        $tranid = 636564742;
        $amount = is_null($request->input('amount')) ? 0 : $request->input('amount');
        
        if(!file_exists(public_path()."/tranid.json") || filesize(public_path()."/tranid.json")===0){
            $fp = fopen(public_path()."/tranid.json", 'w');
            fclose($fp);
        }else{
            $fp = fopen(public_path()."/tranid.json", 'r');
            $tranid = fread($fp, filesize(public_path()."/tranid.json"));
            $tranid = json_decode($tranid);
            $tranid = (int) $tranid;
            fclose($fp);
            $fp = fopen(public_path()."/tranid.json", 'w');
            fwrite($fp, json_encode($tranid+1));
            fclose($fp);
        }

        $signature = "##SCM_UAT##LHYQV##" . $tranid . "##" . $amount . "##0##";

        return response()->json([
            'tranid' => $tranid,
            'signature' => sha1($signature)
        ]);
    }

    public function book_cruise_cabin(Request $request)
    {
        if(empty($request->input('cruise_id')) || is_null($request->input('cruise_id'))){
            return response()->json([
                'mesg' => 'Cruise id is required!'
            ], 422);
        }
        
        $cruise = Cruise::select('id', 'itinerary', 'departure_date')->with(['itinerary' => function($query) {
            $query->select('id', 'ship_code', 'itin_code');
        }])->where('cruise_id', $request->input('cruise_id'))->first()->toArray();

        $xtopia = DB::select("SELECT * FROM xtopia x WHERE 
                                    x.itinerary_code='".$cruise['itinerary']['itin_code']."' AND 
                                    x.ship_code='".$cruise['itinerary']['ship_code']."' AND 
                                    x.dep_start<='".$cruise['departure_date']."' AND 
                                    x.dep_end>='".$cruise['departure_date']."' AND 
                                    x.cabin_code='".$request->input('cabin')."' AND 
                                    x.pax_type_code='".$request->input('pax')."' AND 
                                    x.card_type='CLASSIC' LIMIT 3;");

        $cc = 0;

        if(count($xtopia)>0) {
            $cc = $xtopia[0]->rwcc;
        }

        $input = $request->only(
            'guest',
            'gContactName',
            'gContactMName',
            'gContactSName',
            'gContactEmail',
            'gContactCCode',
            'gContactPhone',
            'cruise_id',
            'cabin',
            'pax',
            'date'
        );

        $input['custom'] = 'true';
        $input['posName'] = 'CASINO ALLOTMENT';
        $input['posType'] = '39';
        $input['posComName'] = 'OPENTRAVEL';
        $input['sailInfoVoyageId'] = 'GD02180606';
        $input['sailInfoShipCode'] = 'WDR';
        $input['currency'] = 'USD';
        $input['fareCode'] = 'RWCC B2M';
        $input['priceCatCode'] = 'BDS';
        $input['waitList'] = 'false';
        $input['guestExists'] = 'false';
        $input['requestGuest'] = 'flase';
// return response()->json($input);
        $input['posName'] = 'CASINO ALLOTMENT';
        $input['posType'] = 39;
        $input['posComName'] = 'OPENTRAVEL';
        $input['sailInfoShipCode'] = $cruise['itinerary']['ship_code'];
        $input['sailInfoVoyageId'] = $request->input('cruise_id');
        $input['currency'] = 'USD';
        $input['currency'] = 'USD';
        $input['fareCode'] = 'RWCC B2M';
        $input['priceCatCode'] = 'BDS';
        $input['waitList'] = 'false';
        $input['guestExists'] = 'false';
        $input['requestGuest'] = 'flase';
        $xml_input = '<?xml version="1.0" encoding="utf-8"?>
            <OTA_CruiseBookRQ Version="1.0" xmlns="http://www.opentravel.org/OTA/2003/05">
                <POS>
                    <Source>
                    <RequestorID Name="'.$input['posName'].'" Type="'.$input['posType'].'"/>
                    <BookingChannel Type="1">
                        <CompanyName>'.$input['posComName'].'</CompanyName>
                    </BookingChannel>
                    </Source>
                </POS>
                <SailingInfo>
                    <SelectedSailing VoyageID="'.$input['sailInfoVoyageId'].'">
                    <CruiseLine ShipCode="'.$input['sailInfoShipCode'].'"/>
                    </SelectedSailing>
                    <Currency CurrencyCode="'.$input['currency'].'"/>
                    <SelectedCategory FareCode="'.$input['fareCode'].'" PricedCategoryCode="'.$input['priceCatCode'].'" WaitlistIndicator="'.$input['waitList'].'"/>
                </SailingInfo>
                <ReservationInfo>
                    <GuestDetails>';

        foreach($input['guest'] as $g){
            $v = $g;
            $v['guestBod'] = explode("/", $v['guestBod']);
            $v['guestAge'] = date("Y") - (int) $v['guestBod'][2];
            $v['guestBod'] = $v['guestBod'][2].'-'.$v['guestBod'][1].'-'.$v['guestBod'][0];
            $v['guestCountryCode'] = 'SG';
            $v['guestCountry'] = 'SG';
            $v['guestRef'] = '1';
            $v['guestDocId'] = 105983934;
            $v['guestDocType'] = 2;
            $v['guestAddType'] = 1;
            $v['guestMemberId'] = $v['memberid'];
            $v['guestProgramId'] = 'PRINCIPLE CARD';
            $v['guestEFlag'] = true;

            $info = app('App\Http\Controllers\V1\Api\UserController')->get_user($request, true, true, $v['memberid']);
            
            if($info['status']===false) {
                return response()->json([
                    'mesg' => $info['mesg']
                ], 422);
            }

            if($info['res']['data']['profile']['email']!==$v['guestEamil']){
                return response()->json([
                    'mesg' => 'Guest email and registered email are not matched!\n Registered email is '.$info['res']['data']['profile']['email']
                ], 422);
            }

            $xml_input .= '<GuestDetail GuestExistsIndicator="'.$input['guestExists'].'" RepeatGuestIndicator="'.$input['requestGuest'].'">
                <ContactInfo Age="'.$v['guestAge'].'" BirthDate="'.$v['guestBod'].'" Gender="'.$v['guestGender'].'" GuestRefNumber="'.$v['guestRef'].'" Nationality="'.$v['guestNat'].'">
                    <PersonName>
                        <GivenName>'.$v['guestName'].'</GivenName>
                        <MiddleName>'.$v['guestMName'].'</MiddleName>
                        <Surname>'.$v['guestSName'].'</Surname>
                        <Document DocID="'.$v['guestDocId'].'" DocType="'.$v['guestDocType'].'"/>
                    </PersonName>
                    <Email>'.$v['guestEamil'].'</Email>
                    <Telephone CountryAccessCode="'.$v['guestCCode'].'" PhoneNumber="'.$v['guestPhone'].'"/>
                    <Address Type="'.$v['guestAddType'].'">
                        <AddressLine>'.$v['guestAdd'].'</AddressLine>
                        <CityName>'.$v['guestCity'].'</CityName>
                        <CountryName Code="'.$v['guestCountryCode'].'">'.$v['guestCountry'].'</CountryName>
                        <PostalCode>'.$v['guestPostal'].'</PostalCode>
                        <StateProv>'.$v['guestState'].'</StateProv>
                    </Address>
                </ContactInfo>
                <LoyaltyInfo MembershipID="'.$v['guestMemberId'].'" ProgramID="'.$v['guestProgramId'].'"/>
                <ContactInfo EmergencyFlag="'.$v['guestEFlag'].'">
                    <PersonName>
                        <GivenName>'.$input['gContactName'].'</GivenName>
                        <MiddleName>'.$input['gContactMName'].'</MiddleName>
                        <Surname>'.$input['gContactSName'].'</Surname>
                    </PersonName>
                    <Email>'.$input['gContactEmail'].'</Email>
                    <Telephone CountryAccessCode="'.$input['gContactCCode'].'" PhoneNumber="'.$input['gContactPhone'].'"/>
                </ContactInfo>
                <TravelDocument DocID="'.$v['gTravDocId'].'" DocIssueLocation="'.$v['gTravDocIssuLoc'].'" DocType="'.$v['gTravDocType'].'" ExpireDate="'.$v['gTravDocExpire'].'"/>
            </GuestDetail>';
        }

        $xml_input .= '</GuestDetails>
            </ReservationInfo>
        </OTA_CruiseBookRQ>';

        $res = app('App\Http\Controllers\Test\SeawareApiTest')->otaCruiseBookRQ($request, $xml_input);

        $paymentProcess = [];

        if($cc>0){

            $existing_rwrc_value = $this->getCCValue($request, false);
            $new_rwrc_value = $existing_rwrc_value - $cc;

            $update = [
                'paraDrsID' => 'MANIC',
                'paraDrsPwd' => 'MANIC',
                'paraCid' => $request->attributes->get('loginuser'),
                'paraWorkGroup' => urlencode('MEML'),
                "paraPFField" => 'RWRC',
                "paraPFValue" => $new_rwrc_value
            ];  

            $updateResult = $this->curlRequest($this->buildDrsXMLContent($update), $this->drsUrl.'API_AutoUA_SetPF', true);
            if(isset($updateResult->errCode)){
                return response()->json($updateResult);
            }
            $paymentProcess = [
                'beforeCC' => $existing_rwrc_value,
                'afterCC' => $new_rwrc_value
            ];
        } else {
            $parameter = [
                'paraDrsID' => 'MANIC',
                'paraDrsPwd' => 'MANIC',
                'paraCid' => 29,
                'paraWorkGroup' => urlencode('MEML'),
                'paraCashToAdjust' => rand(100, 300),
                'paraCashTypeToAdjust' => 0,
                'paraCurrCode' => 'US',
                'paraProfitCenter' => 1,
                'paraRemark' => 'test'
            ];

            $result = $this->curlRequest($this->buildDrsXMLContent($parameter), $this->drsUrl.'API_AutoUA_CEA_Currency', true);
            $paymentProcess = $result;
        }

        return response()->json([
            'booking' => $res,
            'payment' => $paymentProcess,
            
        ]);
    }

    public function getCCValue($request, $err=true)
    {
        $input = [
            'paraDrsID' => 'MANIC',
            'paraDrsPwd' => 'MANIC',
            'paraCid' => $request->attributes->get('loginuser'),
            'paraWorkGroup' => urlencode('MEML'),
            'paraLoadDefaultDRSifNoUA' => 0,
            'paraPFFieldName' => 'RWRC'
        ];

        $result = $this->curlRequest($this->buildDrsXMLContent($input), $this->drsUrl.'API_AutoUA_GetSelectedPF', true);

        if(isset($result->errCode)){
            if($err===false){
                return 0;
            }else{
                return response()->json($result);
            }
        }

        return $result->WorkgroupResult->WorkGroup->PreferenceFlag->PF->Value;
    }
}
