<?php

namespace App\Http\Controllers\V1\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function get_user(Request $request, $return=false, $web=false)
    {
        $input = [
            'paraCid' => $web ? $request->session()->get('drsUserID') : $request->input('paraCid'),
            'paraWorkGroup' => "MEML",
            'paraEnquiryCurrCode' => "US",
            'paraLoadDefaultDRSifNoUA' => "1"
        ];

        $input['paraDrsID'] = $this->drsID;
        $input['paraDrsPwd'] = $this->drsPwd;

        $result = $this->curlRequest($this->buildDrsXMLContent($input), $this->drsUrl.'API_AutoUA_Get_CustomerProfile_Format_Long', true);

        if(isset($result->errCode)){
            return response()->json($result);
        }

        $points = [
            'cc' => [],
            'gp' => []
        ];

        foreach($result->Point->Item as $p) {
            switch (strtolower($p->Type)) {
                case 'sp':
                    $points['gp'] = floor($p->Balance);
                    break;
                
                case 'lp':
                    $points['cc'] = floor($p->Balance);
                    break;
                
                default:
                    # code...
                    break;
            }
        }

        $output_data = array(
            "details" => array(
                "name" => $result->CustomerName,
                "membership_id" => $result->CustomerID,
                "home_country_code" => "SG",
                "home_country_name" => $result->CustomerAddressCountry,
                "home_currency" => $result->CustomerCurrencyCode,
            ),
            "points" => $points,
            "tier" => array(
                "tier_code" => $result->CustomerTypeCode,
                "tier_name" => $result->CustomerTypeDescription,
                "tier_points" => 88,
                "tier_points_max" => 500,
            ),
            "current_bookings" => 2,
        );
        
        if($return){
            return $output_data;
        }

        return response()->json($output_data);
    }
}
