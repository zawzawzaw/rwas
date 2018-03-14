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

        $cruise = Cruise::select('id', 'itinerary')->where('cruise_id', $request->input('cruise_id'))->with([
            'cabins' => function($query) {
                $query->select('id', 'cabin_category', 'cruise', 'pax_count');
            },
            'itinerary'
        ])->first()->toArray();

        if(empty($cruise)){
            return response()->json([
                'mesg' => 'Invalid cruise id!'
            ], 422);
        }
        
        $cabins = [];
        // return response()->json($cruise);
        foreach($cruise['cabins'] as $cabin){
            $cabins[] = [
                'cabin_type_code' => $cabin['cabin_category'],
                'price' => array(
                    'cc' => rand(8, 22),
                    'cc_cash_added' => 0,
                    'gp' => 100,
                    'gp_cash_added' => 0,
                    'cash' => 100
                ),
                'raw' => $cruise
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
                'gp' => 100,
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

    public function book_cruise_cabin(Request $request)
    {
        if(empty($request->input('cruise_id')) || is_null($request->input('cruise_id'))){
            return response()->json([
                'mesg' => 'Cruise id is required!'
            ], 422);
        }
        
        $cruise = Cruise::select('id', 'itinerary', 'departure_date')->with(['itinerary' => function($query) {
            $query->select('id', 'ship_code', 'day', 'night', 'departure_port', 'arrival_port');
        }])->where('cruise_id', $request->input('cruise_id'))->first()->toArray();

        // $input = $request->only(
        //     'posName',
        //     'posType',
        //     'posComName',
        //     'sailInfoVoyageId',
        //     'sailInfoShipCode',
        //     'currency',
        //     'fareCode',
        //     'priceCatCode',
        //     'waitList',
        //     'guestExists',
        //     'requestGuest',
        //     'guestAge',
        //     'guestBod',
        //     'guestGender',
        //     'guestRef',
        //     'guestNat',
        //     'guestName',
        //     'guestMName',
        //     'guestSName',
        //     'guestDocId',
        //     'guestDocType',
        //     'guestEamil',
        //     'guestCCode',
        //     'guestPhone',
        //     'guestAddType',
        //     'guestAdd',
        //     'guestCity',
        //     'guestCountry',
        //     'guestCountryCode',
        //     'guestPostal',
        //     'guestState',
        //     'guestMemberId',
        //     'guestProgramId',
        //     'guestEFlag',
        //     'gContactName',
        //     'gContactMName',
        //     'gContactSName',
        //     'gContactEmail',
        //     'gContactCCode',
        //     'gContactPhone',
        //     'gTravDocId',
        //     'gTravDocIssuLoc',
        //     'gTravDocType',
        //     'gTravDocExpire'
        // );

        $input = [
            'custom' => 'true',
            'posName' => 'CASINO ALLOTMENT',
            'posType' => '39',
            'posComName' => 'OPENTRAVEL',
            'sailInfoVoyageId' => 'GD02180606',
            'sailInfoShipCode' => 'WDR',
            'currency' => 'USD',
            'fareCode' => 'RWCC B2M',
            'priceCatCode' => 'BDS',
            'waitList' => 'false',
            'guestExists' => 'false',
            'requestGuest' => 'flase',
            'guestAge' => '30',
            'guestBod' => '1985-01-11',
            'guestGender' => 'Male',
            'guestRef' => '1',
            'guestNat' => 'SG',
            'guestName' => 'Zaw',
            'guestMName' => 'Zaw',
            'guestSName' => 'Aung',
            'guestDocId' => '105983934',
            'guestDocType' => '2',
            'guestEamil' => 'zawzawzaw@gmail.com',
            'guestCCode' => '1',
            'guestPhone' => '91828392',
            'guestAddType' => '1',
            'guestAdd' => '1 test road',
            'guestCity' => 'Singapore',
            'guestCountry' => 'SG',
            'guestCountryCode' => 'SG',
            'guestPostal' => '11123',
            'guestState' => 'Singapore',
            'guestMemberId' => '29',
            'guestProgramId' => 'PRINCIPLE CARD',
            'guestEFlag' => 'true',
            'gContactName' => 'Joshua',
            'gContactMName' => '',
            'gContactSName' => 'Didham',
            'gContactEmail' => 'joshua@manic.com.sg',
            'gContactCCode' => '1',
            'gContactPhone' => '23232323',
            'gTravDocId' => '4066601',
            'gTravDocIssuLoc' => 'Location',
            'gTravDocType' => '2',
            'gTravDocExpire' => '2020-12-17'
        ];
// return response()->json($input);
        $input['posName'] = 'CASINO ALLOTMENT';
        $input['posType'] = 39;
        $input['guestBod'] = explode("/", $input['guestBod']);
        $input['guestAge'] = date("Y") - $input['guestBod'][2];
        $input['guestBod'] = $input['guestBod'][2].'-'.$input['guestBod'][1].'-'.$input['guestBod'][0];
        $input['posComName'] = 'OPENTRAVEL';
        $input['sailInfoShipCode'] = $cruise['itinerary']['ship_code'];
        $input['sailInfoVoyageId'] = $request->input('cruise_id');
        $input['currency'] = 'USD';
        $input['guestCountryCode'] = 'SG';
        $input['guestCountry'] = 'SG';
        $input['currency'] = 'USD';
        $input['fareCode'] = 'RWCC B2M';
        $input['priceCatCode'] = 'BDS';
        $input['waitList'] = 'false';
        $input['guestExists'] = 'false';
        $input['requestGuest'] = 'flase';
        $input['guestRef'] = '1';
        $input['guestDocId'] = 105983934;
        $input['guestDocType'] = 2;
        $input['guestAddType'] = 1;
        $input['guestMemberId'] = 29;
        $input['guestProgramId'] = 'PRINCIPLE CARD';
        $input['guestEFlag'] = true;
        
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
                <GuestDetails>
                    <GuestDetail GuestExistsIndicator="'.$input['guestExists'].'" RepeatGuestIndicator="'.$input['requestGuest'].'">
                        <ContactInfo Age="'.$input['guestAge'].'" BirthDate="'.$input['guestBod'].'" Gender="'.$input['guestGender'].'" GuestRefNumber="'.$input['guestRef'].'" Nationality="'.$input['guestNat'].'">
                            <PersonName>
                                <GivenName>'.$input['guestName'].'</GivenName>
                                <MiddleName>'.$input['guestMName'].'</MiddleName>
                                <Surname>'.$input['guestSName'].'</Surname>
                                <Document DocID="'.$input['guestDocId'].'" DocType="'.$input['guestDocType'].'"/>
                            </PersonName>
                            <Email>'.$input['guestEamil'].'</Email>
                            <Telephone CountryAccessCode="'.$input['guestCCode'].'" PhoneNumber="'.$input['guestPhone'].'"/>
                            <Address Type="'.$input['guestAddType'].'">
                                <AddressLine>'.$input['guestAdd'].'</AddressLine>
                                <CityName>'.$input['guestCity'].'</CityName>
                                <CountryName Code="'.$input['guestCountryCode'].'">'.$input['guestCountry'].'</CountryName>
                                <PostalCode>'.$input['guestPostal'].'</PostalCode>
                                <StateProv>'.$input['guestState'].'</StateProv>
                            </Address>
                        </ContactInfo>
                        <LoyaltyInfo MembershipID="'.$input['guestMemberId'].'" ProgramID="'.$input['guestProgramId'].'"/>
                        <ContactInfo EmergencyFlag="'.$input['guestEFlag'].'">
                            <PersonName>
                                <GivenName>'.$input['gContactName'].'</GivenName>
                                <MiddleName>'.$input['gContactMName'].'</MiddleName>
                                <Surname>'.$input['gContactSName'].'</Surname>
                            </PersonName>
                            <Email>'.$input['gContactEmail'].'</Email>
                            <Telephone CountryAccessCode="'.$input['gContactCCode'].'" PhoneNumber="'.$input['gContactPhone'].'"/>
                        </ContactInfo>
                        <TravelDocument DocID="'.$input['gTravDocId'].'" DocIssueLocation="'.$input['gTravDocIssuLoc'].'" DocType="'.$input['gTravDocType'].'" ExpireDate="'.$input['gTravDocExpire'].'"/>
                    </GuestDetail>
                </GuestDetails>
            </ReservationInfo>
        </OTA_CruiseBookRQ>';

        $res = $this->curlRequest($xml_input, true, $this->drsUrl."rest/OTA_CruiseBookRQ", true);
        $input = [
            'paraDrsID' => 'MANIC',
            'paraDrsPwd' => 'MANIC',
            'paraCid' => 29,
            'paraWorkGroup' => urlencode('MEML'),
            'paraLoadDefaultDRSifNoUA' => 0,
            "paraPFFieldName" => 'RWRC'
        ];        

        $result = $this->curlRequest($this->buildDrsXMLContent($input), $this->drsUrl.'API_AutoUA_GetSelectedPF', true);

        if(isset($result->errCode)){
            return response()->json($result);
        }

        $existing_rwrc_value = $result->WorkgroupResult->WorkGroup->PreferenceFlag->PF->Value;
        $new_rwrc_value = $existing_rwrc_value + rand(8, 22);

        $update = [
            'paraDrsID' => 'MANIC',
            'paraDrsPwd' => 'MANIC',
            'paraCid' => 29,
            'paraWorkGroup' => urlencode('MEML'),
            "paraPFField" => 'RWRC',
            "paraPFValue" => $new_rwrc_value
        ];  

        $updateResult = $this->curlRequest($this->buildDrsXMLContent($update), $this->drsUrl.'API_AutoUA_SetPF', true);

        return response()->json($res);
    }

}
