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
            return [
                'data' => $output_data,
                'raw' => $result
            ];
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
            return 'success';
        }
    }

    public function register(Request $request)
    {
        $input = $request->only(
            'title',
            'first_name',
            'last_name',
            'gender',
            'date_of_birth',
            'nationality',
            'doc_type',
            'doc_no',
            'doc_country',
            'doc_issue_date',
            'doc_expiry_date',
            'occupation',
            'nature_of_business',
            'email',
            'mobile_country',
            'mobile_number',
            'address_line_01',
            'address_line_02',
            'address_line_03',
            'address_country',
            'address_state',
            'address_city',
            'address_postal_code',
            'preferred_language',
            'pin',
            'pin_confirm',
            'head_of_state',
            'subscribe_to_gra',
            'privacy_policy',
            'promo_permission'
        );

        $validator = Validator::make($input, [
            'title' => 'required|in:MR,MS,MDM',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required|in:M,F',
            'date_of_birth' => 'required|date_format:"d/m/Y"',
            'nationality' => 'required',
            'doc_type' => 'nullable|in:IC,PP',
            'doc_issue_date' => 'nullable|date_format:"d/m/Y',
            'doc_expiry_date' => 'nullable|date_format:"d/m/Y',
            'email' => 'required|email',
            'mobile_country' => 'required|numeric',
            'mobile_number' => 'required|numeric',
            'address_line_01' => 'required',
            'address_line_02' => 'nullable',
            'address_line_03' => 'nullable',
            'address_country' => 'required',
            'address_state' => 'required',
            'address_city' => 'required',
            'address_postal_code' => 'required',
            'pin' => 'required|min:6',
            'pin_confirm' => 'required|min:6|same:pin',
            'head_of_state' => 'nullable|in:YES,NO',
            'privacy_policy' => 'required|in:YES',
            'promo_permission' => 'nullable|in:YES,NO'
        ]);

        if($validator->fails()){
            return response()->json($validator->errors()->all(), 422);
        }
        
        $register = [
            'paraDrsID' => $this->drsID,
            'paraDrsPwd' => $this->drsPwd,
            'paraDRSWorkgroup' => $this->DRSWORKGROUP,
            // 'paraPreLang' => isset($input['preferred_language'])==false || is_null($input['preferred_language']) ? "" : $input['preferred_language'],
            'paraPreLang' => 'EN',
            'paraCardTypeCode' => $this->DRSCARDTYPE,
            'paraCurrCode' => $this->DRSCURRCODE,
            'paraTitle' => $input['title'],
            'paraLName' => $input['last_name'],
            'paraFName' => $input['first_name'],
            'paraCNameLang' => 'ZH',
            'paraCTitle' => '',
            'paraCLName' => '',
            'paraCFName' => '',
            'paraGender' => $input['gender'],
            'paraDOB' => date('Y-m-d', strtotime(str_replace("/", "-", $input['date_of_birth']))),
            'paraNAT' => $input['nationality'],
            'paraEmail' => $input['email'],
            'paraTELMobile' => '+'.$input['mobile_country'].$input['mobile_number'],
            'paraDoc_Type' => isset($input['doc_type'])==false || is_null($input['doc_type']) ? "" : $input['doc_type'],
            'paraDoc_No' => isset($input['doc_no'])==false || is_null($input['doc_no']) ? "" : $input['doc_no'],
            'paraDoc_Country' => isset($input['doc_country'])==false || is_null($input['doc_country']) ? "" : $input['doc_country'],
            'paraDoc_IssueDT' => isset($input['doc_issue_date'])==false || is_null($input['doc_issue_date']) ? "" : date('Y-m-d', strtotime(str_replace("/", "-", $input['doc_issue_date']))),
            'paraDoc_ExpiryDT' => isset($input['doc_expiry_date'])==false || is_null($input['doc_expiry_date']) ? "" : date('Y-m-d', strtotime(str_replace("/", "-", $input['doc_expiry_date']))),
            'paraAddressHomeLanguageCode' => $this->DRSADDRGOMELANGCODE,
            'paraAddDescription' => 'HOME',
            'paraAddressHomeLine1' => $input['address_line_01'],
            'paraAddressHomeLine2' => isset($input['address_line_02'])==false || is_null($input['address_line_02']) ? "" : $input['address_line_02'],
            'paraAddressHomeLine3' => isset($input['address_line_03'])==false || is_null($input['address_line_03']) ? "" : $input['address_line_03'],
            'paraAddCity' => $input['address_city'],
            'paraAddState' => $input['address_state'],
            'paraAddressHomeCountry' => $input['address_country'],
            'paraAddPostCode' => $input['address_postal_code'],
            'PF1Field' => 'OCC',
            'PF1Value' => isset($input['occupation'])==false || is_null($input['occupation']) ? "" : $input['occupation'],
            'PF2Field' => 'BIZ2',
            'PF2Value' => isset($input['nature_of_business'])==false || is_null($input['nature_of_business']) ? "" : $input['nature_of_business'],
            'PF3Field' => 'SPEP',
            'PF3Value' => isset($input['head_of_state '])==false || is_null($input['head_of_state']) ? "" : strtoupper($input['head_of_state']),
            'PF4Field' => 'GRA',
            'PF4Value' => date('ymd').'/'.(isset($input['subscribe_to_gra  '])==false || is_null($input['subscribe_to_gra ']) ? "" : strtoupper($input['subscribe_to_gra '])==="YES" ? "IN" : "OUT"),
            'PF5Field' => 'COM',
            'PF5Value' => (isset($input['promo_permission '])==false || is_null($input['promo_permission']) ? "" : strtoupper($input['promo_permission'])==="YES" ? "IN" : "OUT").'/'.date('ymd').'/OF',
            'PF6Field' => 'OA',
            'PF6Value' => 'OA_RWAS WEBSITE',
            'PF7Field' => 'CTLD',
            'PF7Value' => date('Ymd'),
            'PF8Field' => 'CTRP',
            'PF8Value' => date('Ymd', strtotime('+1 years')),
            'PF9Field' => '',
            'PF9Value' => '',
            'PF10Field' => '',
            'PF10Value' => ''
        ];

        $regResult = $this->curlRequest($this->buildDrsXMLContent($register), $this->drsUrl.'API_NewCustomer_V3', true);
        
        if(isset($result->errCode)){
            return response()->json($regResult, 422);
        }

        $input = [
            'paraDrsID' => $this->drsID,
            'paraDrsPwd' => $this->drsPwd,
            'paraCid' => $regResult->MemberID,
            'paraPIN' => $input['pin']
        ];
    
        $pinResult = $this->curlRequest($this->buildDrsXMLContent($input), $this->drsUrl.'API_AutoUA_PINCreate', true);
        
        if(isset($pinResult->errCode)){
            return response()->json($pinResult, 422);
        }
    
        return response()->json($regResult);
    }
    
    public function update(Request $request)
    {
        $input = $request->only(
            'paraCid',
            'paraEmail',
            'paraHOME',
            'paraBusiness',
            'paraMOBILE',
            'paraSMS',
            'paraAdd1',
            'paraAdd2',
            'paraAdd3',
            'paraCity',
            'paraState',
            'paraCountry',
            'paraPostcode',
            'paraPreLanguage',
            'PF1Field',
            'PF1Value',
            'PF2Field',
            'PF2Value',
            'PF3Field',
            'PF3Value',
            'PF4Field',
            'PF4Value',
            'PF5Field',
            'PF5Value',
            'PF6Field',
            'PF6Value',
            'PF7Field',
            'PF7Value',
            'PF8Field',
            'PF8Value',
            'PF9Field',
            'PF9Value',
            'PF10Field',
            'PF10Value'
        );

        $update = [
            'paraDrsID' => $this->drsID,
            'paraDrsPwd' => $this->drsPwd,
            'paraDRSWorkgroup' => $this->DRSWORKGROUP,
            'paraCardTypeCode' => $this->DRSCARDTYPE,
            'paraCid' => $input['paraCid'],
            'paraEmail' => $input['paraEmail'],
            'paraHOME' => $input['paraHOME'],
            'paraBusiness' => $input['paraBusiness'],
            'paraMOBILE' => $input['paraMOBILE'],
            'paraSMS' => $input['paraSMS'],
            'paraAdd1' => $input['paraAdd1'],
            'paraAdd2' => $input['paraAdd2'],
            'paraAdd3' => $input['paraAdd3'],
            'paraCity' => $input['paraCity'],
            'paraState' => $input['paraState'],
            'paraCountry' => $input['paraCountry'],
            'paraPostcode' => $input['paraPostcode'],
            'paraPreLanguage' => 'EN',
            'paraCurrCode' => $this->DRSCURRCODE,
            'PF1Field' => 'OCC',
            'PF1Value' => $input['PF1Value'],
            'PF2Field' => 'BIZ2',
            'PF2Value' => $input['PF2Value'],
            'PF3Field' => 'SPEP',
            'PF3Value' => $input['PF3Value'],
            'PF4Field' => 'GRA',
            'PF4Value' => $input['PF4Value'],
            'PF5Field' => 'COM',
            'PF5Value' => $input['PF5Value'],
            'PF6Field' => 'OA',
            'PF6Value' => $input['PF6Value'],
            'PF7Field' => 'CTLD',
            'PF7Value' => $input['PF7Value'],
            'PF8Field' => 'CTRP',
            'PF8Value' => $input['PF8Value'],
            'PF9Field' => '',
            'PF9Value' => '',
            'PF10Field' => '',
            'PF10Value' => ''
        ];

        $result = $this->curlRequest($this->buildDrsXMLContent($update), $this->drsUrl.'API_EditCustomerV2', true);

        return response()->json($result);
    }
}
