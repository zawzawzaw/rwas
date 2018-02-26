<?php

namespace App\Http\Controllers\Test;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DrsApiTestController extends Controller
{
    protected $rootUrl;
    public function __construct()
    {
        $this->rootUrl = 'http://52.77.149.78/DRSAPI_DEV/Service.asmx/';
    }

    public function acnillaryPointAdjustment(Request $request)
    {
        $input = $request->only(
            'paraDrsID',
            'paraDrsPwd',
            'paraCid',
            'paraCashToAdjust',
            'paraPointType',
            'paraCurrCode',
            'paraProfitCenter',
            'paraRemark',
            'paraOvrTooMuchFlag'
        );

        $result = $this->execCurl($this->buildXMLContent($input), $this->rootUrl.'API_AutoUA_APA_Currency_OvrTooMuchFlag', true);

        return response()->json($result);
    }

    public function apiAutoUACompV2(Request $request)
    {
        $input = $request->only(
            'paraDrsID',
            'paraDrsPwd',
            'paraCid',
            'paraProfitCenter',
            'paraCurrency',
            'paraPointType',
            'paraCashValue',
            'paraPointDrawdown',
            'paraCompIssueLoc'
        );

        $result = $this->execCurl($this->buildXMLContent($input), $this->rootUrl.'API_AutoUA_COMP_V2 ', true);

        return response()->json($result);
    }

    public function apiAutoUAGetPF(Request $request)
    {
        $input = $request->only(
            'paraDrsID',
            'paraDrsPwd',
            'paraCid',
            'paraWorkGroup',
            'paraLoadDefaultDRSifNoUA'
        );

        $result = $this->execCurl($this->buildXMLContent($input), $this->rootUrl.'API_AutoUA_GetPF', true);

        return response()->json($result);
    }

    public function apiAutoUAGetSelectedPF(Request $request)
    {
        $input = $request->only(
            'paraDrsID',
            'paraDrsPwd',
            'paraCid',
            'paraWorkGroup',
            'paraLoadDefaultDRSifNoUA',
            'paraPFFieldName'
        );

        $result = $this->execCurl($this->buildXMLContent($input), $this->rootUrl.'API_AutoUA_GetPF', true);

        return response()->json($result);
    }

    public function apiAutoUAGetCustomerProfileFormatLong(Request $request)
    {
        $input = $request->only(
            'paraDrsID',
            'paraDrsPwd',
            'paraCid',
            'paraWorkGroup',
            'paraEnquiryCurrCode',
            'paraLoadDefaultDRSifNoUA'
        );

        $result = $this->execCurl($this->buildXMLContent($input), $this->rootUrl.'API_AutoUA_Get_CustomerProfile_Format_Long', true);

        return response()->json($result);
    }
    
    public function apiAutoUAPinChange(Request $request)
    {
        $input = $request->only(
            'paraDrsID',
            'paraDrsPwd',
            'paraCid',
            'paraWorkGroup',
            'paraPINNew',
            'paraPINOld'
        );

        $result = $this->execCurl($this->buildXMLContent($input), $this->rootUrl.'API_AutoUA_PINChange', true);

        return response()->json($result);
    }

    public function apiAutoUAPinCreate(Request $request){
        $input = $request->only(
            'paraDrsID',
            'paraDrsPwd',
            'paraCid',
            'paraPIN'
        );
    
        $result = $this->curlRequest($this->buildXMLContent($input), $this->rootUrl.'API_AutoUA_PINCreate', true);
    
        return response()->json($result);
    }

    public function apiAutoUAPinVerify(Request $request){
        $input = $request->only(
            'paraDrsID',
            'paraDrsPwd',
            'paraCid',
            'paraPIN'
        );

        $result = $this->curlRequest($this->buildXMLContent($input), $this->rootUrl.'API_AutoUA_PINVerify', true);

        return response()->json($result);
    }

    public function apiAutoUASetPF(Request $request)
    {
        $input = $request->only(
            'paraDrsID',
            'paraDrsPwd',
            'paraCid',
            'paraWorkGroup',
            'paraPFField',
            'paraPFValue'
        );

        $result = $this->execCurl($this->buildXMLContent($input), $this->rootUrl.'API_AutoUA_SetPF', true);

        return response()->json($result);
    }

    public function apiEditCustomerV2(Request $request)
    {
        $input = $request->only(
            'paraDrsID',
            'paraDrsPwd',
            'paraCardLogin',
            'paraDRSWorkgroup',
            'paraCid',
            'paraDocNo',
            'paraCompIssueLoc',
            'paraCardTypeCode',
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

        $result = $this->execCurl($this->buildXMLContent($input), $this->rootUrl.'API_EditCustomerV2', true, false);

        return response()->json($result);
    }
    
    public function apiNewCustomerV1(Request $request)
    {
        $input = $request->only(
            'paraDrsID',
            'paraDrsPwd',
            'paraDRSWorkgroup',
            'paraPreLang',
            'paraCardTypeCode',
            'paraCurrCode',
            'paraTitle',
            'paraLName',
            'paraFName',
            'paraCNameLang',
            'paraCTitle',
            'paraCLName',
            'paraCFName',
            'paraGender',
            'paraDOB',
            'paraNAT',
            'paraEmail',
            'paraTELMobile',
            'paraDoc_Type',
            'paraDoc_No',
            'paraDoc_Country',
            'paraDoc_IssueDT',
            'paraDoc_ExpiryDT',
            'paraAddressHomeLanguageCode',
            'paraAddDescription',
            'paraAddressHomeLine1',
            'paraAddressHomeLine2',
            'paraAddressHomeLine3',
            'paraAddCity',
            'paraAddState',
            'paraAddressHomeCountry',
            'paraAddPostCode',
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
        
        $result = $this->execCurl($this->buildXMLContent($input), $this->rootUrl.'API_NewCustomer_V3', true);
        
        return response()->json($result);
    }

    public function apiReportCsrV2(Request $request)
    {
        $input = $request->only(
            'paraDrsID',
            'paraDrsPwd',
            'paraCid',
            'paraLoadDefaultDRSifNoUA'
        );

        $result = $this->execCurl($this->buildXMLContent($input), $this->rootUrl.'API_Report_CSR', true);

        return response()->json($result);
    }

    public function apiReportCtsV2(Request $request)
    {
        $input = $request->only(
            'paraDrsID',
            'paraDrsPwd',
            'paraCid',
            'paraDTFr',
            'paraDTTo',
            'paraCurrency',
            'paraLoadDefaultDRSifNoUA'
        );

        $result = $this->execCurl($this->buildXMLContent($input), $this->rootUrl.'API_Report_CTSv2', true);

        return response()->json($result);
    }

    private function buildXMLContent($data)
    {
        $fields = '';
        foreach($data as $key=>$value) {
            $fields .= $key.'='.urlencode($value).'&';
        }
        rtrim($fields, '&');
        return $fields;
    }

    private function execCurl($xmlContent, $url, $isPost=false, $parse=true)
    {
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, $isPost);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if($xmlContent!=="") {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlContent);
        }

        $result = curl_exec($ch);

        if($parse===false){
            return $result;
        }

        $result = simplexml_load_string($result);
        return $result;
    }
}
