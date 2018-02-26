<?php

namespace App\Http\Controllers\V1\Api;

use Validator;

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

    public function login(Request $request)
    {        
        $input = $request->only('id', 'password', 'cid', 'pin', 'showErr');
        $validator = Validator::make($input, [
            'id' => 'required',
            'password' => 'required'
        ]);

        if($validator->fails()){
           return redirect()->back()->withErrors($validator)->withInput();
        }

        $parameter = [
            'paraDrsID' => 'MANIC',
            'paraDrsPwd' => 'MANIC',
            'paraCid' => $input['id'],
            'paraPIN' => $input['password']
        ];

        $result = $this->curlRequest($this->buildDrsXMLContent($parameter), $this->drsUrl.'API_AutoUA_PINVerify', true);

        if(isset($result->errCode)){
            // if(isset($input['showErr']) && is_null($input['showErr'])==false){
            //     echo "<pre>";
            //     print_r($result);
            //     echo "</pre>";
            //     die();
            // }
            $validator->errors()->add('customErr', 'Wrong id, password, cid or pin!');
            return 'fail';
        }else{
            // $request->session()->put('drsAuth', 1);
            // $request->session()->put('drsUserID', $input['id']);
            return 'success';
        }
    }
}
