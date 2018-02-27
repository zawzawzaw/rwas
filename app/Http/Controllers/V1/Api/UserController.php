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

        $mobile = "";

        foreach($result->Contact->ContactSection->Cust_Contact as $con){
            if(strtolower($con->Type)==="mobile"){
                $mobile = $con->ContactNo;
                break;
            }
        }

        $occupation = "";
        $nature_of_business = "";

        foreach($result->PreferenceFlagList->WorkGroup->PreferenceFlag->PF as $pf){
            switch (strtolower($pf->Field)) {
                case 'occ':
                    $occupation = $pf->Value;
                    break;
                
                case 'biz2':
                    $nature_of_business = $pf->Value;
                    break;
                
                default:
                    # code...
                    break;
            }
        }

        $output_data = array(
            "details" => array(
                "title" => $result->CustomerTitle,
                "name" => $result->CustomerName,
                "membership_id" => $result->CustomerID,

                // useful for specifying which translation to use on login
                'preferred_language' => $result->CustomerPreferredLanguage,

                "home_country_region_code" => $result->CustomerRegionCode,
                "home_country_name" => $result->CustomerAddressCountry,
                "home_currency" => $result->CustomerCurrencyCode,
            ),
            "profile" => array(

                'gender' => $result->CustomerGender,
                'date_of_birth' => $result->CustomerDateOfBirth,
                'nationality' => $result->CustomerNAT,

                // must read the preference flags to see which one it is
                // 'occupation' => $result->CustomerCurrencyCode,
                // 'nature_of_business' => $result->CustomerCurrencyCode,
                
                'occupation' => $occupation,
                'nature_of_business' => $nature_of_business,
                
                'email' => $result->EmailAddress,

                // please fix this for me
                // 'mobile' => '88888888',    
                'mobile' => $mobile,
                
                'address_line_01' => $result->CustomerAddressLine1,
                'address_line_02' => $result->CustomerAddressLine2,
                'address_line_03' => $result->CustomerAddressLine3,
                'address_country' => $result->CustomerAddressCountry,
                'address_state' => $result->CustomerAddressState,
                'address_city' => $result->CustomerAddressCity,
                'address_postal_code' => $result->CustomerAddressPostCode, 
            ),
            "points" => $points,
            "tier" => array(
                "tier_code" => $result->CustomerTypeCode,
                "tier_name" => $result->CustomerTypeDescription,
                "tier_points" => $result->Point->Item[6]->Balance,
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

        return response()->json($result);
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




    public function login_json_output(Request $request)
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
            return json_encode(array('message' => 'fail'));
        }else{
            return json_encode(array('message' => 'success'));
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
            'paraTitle' => (String) $input['title'],
            'paraLName' => (String) $input['last_name'],
            'paraFName' => (String) $input['first_name'],
            'paraCNameLang' => 'ZH',
            'paraCTitle' => '',
            'paraCLName' => '',
            'paraCFName' => '',
            'paraGender' => (String) $input['gender'],
            'paraDOB' => date('Y-m-d', strtotime(str_replace("/", "-", $input['date_of_birth']))),
            'paraNAT' => (String) $input['nationality'],
            'paraEmail' => (String) $input['email'],
            'paraTELMobile' => '+'.$input['mobile_country'].$input['mobile_number'],
            'paraDoc_Type' => isset($input['doc_type'])==false || is_null($input['doc_type']) ? "" : (String) $input['doc_type'],
            'paraDoc_No' => isset($input['doc_no'])==false || is_null($input['doc_no']) ? "" : (String) $input['doc_no'],
            'paraDoc_Country' => isset($input['doc_country'])==false || is_null($input['doc_country']) ? "" : (String) $input['doc_country'],
            'paraDoc_IssueDT' => isset($input['doc_issue_date'])==false || is_null($input['doc_issue_date']) ? "" : date('Y-m-d', strtotime(str_replace("/", "-", $input['doc_issue_date']))),
            'paraDoc_ExpiryDT' => isset($input['doc_expiry_date'])==false || is_null($input['doc_expiry_date']) ? "" : date('Y-m-d', strtotime(str_replace("/", "-", $input['doc_expiry_date']))),
            'paraAddressHomeLanguageCode' => (String) $this->DRSADDRGOMELANGCODE,
            'paraAddDescription' => (String) 'HOME',
            'paraAddressHomeLine1' => (String) $input['address_line_01'],
            'paraAddressHomeLine2' => isset($input['address_line_02'])==false || is_null($input['address_line_02']) ? "" : (String) $input['address_line_02'],
            'paraAddressHomeLine3' => isset($input['address_line_03'])==false || is_null($input['address_line_03']) ? "" : (String) $input['address_line_03'],
            'paraAddCity' => (String) $input['address_city'],
            'paraAddState' => (String) $input['address_state'],
            'paraAddressHomeCountry' => (String) $input['address_country'],
            'paraAddPostCode' => (String) $input['address_postal_code'],
            'PF1Field' => 'OCC',
            'PF1Value' => isset($input['occupation'])==false || is_null($input['occupation']) ? "" : (String) $input['occupation'],
            'PF2Field' => 'BIZ2',
            'PF2Value' => isset($input['nature_of_business'])==false || is_null($input['nature_of_business']) ? "" : (String) $input['nature_of_business'],
            'PF3Field' => 'SPEP',
            'PF3Value' => isset($input['head_of_state '])==false || is_null($input['head_of_state']) ? "" : (String) strtoupper($input['head_of_state']),
            'PF4Field' => 'GRA',
            'PF4Value' => date('ymd').'/'.(isset($input['subscribe_to_gra  '])==false || is_null($input['subscribe_to_gra ']) ? "" : (String) strtoupper($input['subscribe_to_gra '])==="YES" ? "IN" : "OUT"),
            'PF5Field' => 'COM',
            'PF5Value' => (isset($input['promo_permission '])==false || is_null($input['promo_permission']) ? "" : strtoupper($input['promo_permission'])==="YES" ? "IN" : "OUT").'/'.date('ymd').'/OF',
            'PF6Field' => 'OA',
            'PF6Value' => (String) 'OA_RWAS WEBSITE',
            'PF7Field' => 'CTLD',
            'PF7Value' => (String) date('Ymd'),
            'PF8Field' => 'CTRP',
            'PF8Value' => (String) date('Ymd', strtotime('+1 years')),
            'PF9Field' => '',
            'PF9Value' => '',
            'PF10Field' => '',
            'PF10Value' => ''
        ];

        $regResult = $this->curlRequest($this->buildDrsXMLContent($register), $this->drsUrl.'API_NewCustomer_V3', true);
        
        if(isset($regResult->errCode)){
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
            'email',
            'mobile',
            'address_line_01',
            'address_line_02',
            'address_line_03',
            'address_country',
            'address_state',
            'address_city',
            'address_postal_code',
            'preferred_language',
            'occupation',
            'nature_of_business'
        );

        $update = [
            'paraDrsID' => $this->drsID,
            'paraDrsPwd' => $this->drsPwd,
            'paraDRSWorkgroup' => $this->DRSWORKGROUP,
            'paraCardTypeCode' => '99',
            'paraCid' => is_null($request->session()->get('drsUserID'))===false ? $request->session()->get('drsUserID') : $request->input('paraCid'),
            'paraEmail' => (String) $input['email'],
            'paraHOME' => (String) '',
            'paraBUSINESS' => (String) '',
            'paraMOBILE' => (String) '+'.$input['mobile'],
            'paraSMS' => (String) '',
            'paraAdd1' => (String) $input['address_line_01'],
            'paraAdd2' => (String) $input['address_line_02'],
            'paraAdd3' => (String) $input['address_line_03'],
            'paraCity' => (String) $input['address_city'],
            'paraState' => (String) $input['address_state'],
            'paraCountry' => (String) $input['address_country'],
            'paraPostcode' => (String) $input['address_postal_code'],
            'paraPreLanguage' => $input['preferred_language'],
            'PF1Field' => 'OCC',
            'PF1Value' => isset($input['occupation'])==false || is_null($input['occupation']) ? "" : (String) $input['occupation'],
            'PF2Field' => 'BIZ2',
            'PF2Value' => isset($input['nature_of_business'])==false || is_null($input['nature_of_business']) ? "" : (String) $input['nature_of_business'],
            'PF3Field' => '',
            'PF3Value' => '',
            'PF4Field' => '',
            'PF4Value' => '',
            'PF5Field' => '',
            'PF5Value' => '',
            'PF6Field' => '',
            'PF6Value' => '',
            'PF7Field' => '',
            'PF7Value' => '',
            'PF8Field' => '',
            'PF8Value' => '',
            'PF9Field' => '',
            'PF9Value' => '',
            'PF10Field' => '',
            'PF10Value' => ''
        ];

        $result = $this->curlRequest($this->buildDrsXMLContent($update), $this->drsUrl.'API_EditCustomerV2', true);

        return response()->json($result);
    }
}
