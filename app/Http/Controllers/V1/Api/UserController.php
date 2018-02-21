<?php

namespace App\Http\Controllers\V1\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function get_user(Request $request)
    {
        // $input = $request->only(
            // 'paraCid',
        //     'paraWorkGroup',
        //     'paraEnquiryCurrCode',
        //     'paraLoadDefaultDRSifNoUA'
        // );
        $input = [
            'paraCid' => 29,
            'paraWorkGroup' => "MEML",
            'paraEnquiryCurrCode' => "US",
            'paraLoadDefaultDRSifNoUA' => "1paint"
        ];

        $input['paraDrsID'] = $this->drsID;
        $input['paraDrsPwd'] = $this->drsPwd;

        $result = $this->curlRequest($this->buildDrsXMLContent($input), $this->drsUrl.'API_AutoUA_Get_CustomerProfile_Format_Long', true);

        $output_data = array(
            "details" => array(
                "name" => $result->CustomerName,
                "membership_id" => $result->CustomerID,
                "home_country_code" => "SG",
                "home_country_name" => $result->CustomerAddressCountry,
                "home_currency" => $result->CustomerCurrencyCode,
            ),
            "points" => $result->Point->Item,
            "tier" => array(
                "tier_code" => $result->CustomerTypeCode,
                "tier_name" => $result->CustomerTypeDescription,
                "tier_points" => 88,
                "tier_points_max" => 500,
            ),
            "current_bookings" => 2,
        );

        return response()->json($output_data);
    }
}
