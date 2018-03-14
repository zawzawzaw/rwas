<?php

namespace App\Http\Controllers\Test;

use File;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SeawareApiTest extends Controller
{
    protected $headerInfo;
    protected $rootUrl;
    
    public function __construct()
    {
        $this->rootUrl = "http://13.228.122.182:8081/ota/";
        
        if(!file_exists(public_path()."/token.json") || (time()-filemtime(public_path()."/token.json"))>800 || filesize(public_path()."/token.json")<0){
            $this->loginOnly();
        }

        $fp = fopen(public_path()."/token.json", 'r');
        $content = fread($fp, filesize(public_path()."/token.json"));
        fclose($fp);
        $content = json_decode($content);

        $this->headerInfo = [
            'Content-Type: application/xml',
            'Authorization: Bearer '.$content->access_token,
        ];
    }

    public function merchantLogin(Request $request)
    {
        $res = $this->loginOnly();
        return response()->json($res);
    }

    public function retriveMerchent(Request $request)
    {
        return response()->json($this->headerInfo);
    }

    private function loginOnly()
    {
        $this->headerInfo = [
            'Content-Type: application/x-www-form-urlencoded',
        ];
        $url = 'http://13.228.122.182:8081/ota/oauth/token?username=USDVIPP&password=xzXf0M&client_id=ota&client_secret=ota&grant_type=password&scope=travelagent';
        $res = $this->execCurl("", true, $url);
        $res = json_decode($res);
        $fp = fopen(public_path()."/token.json", 'w');
        fwrite($fp, json_encode($res));
        fclose($fp);
        return $res;
    }

    public function otaCruiseSailAvail(Request $request)
    {
        $input = $request->only(
            'custom',
            'name',
            'type',
            'channelType',
            'comName',
            'code1',
            'qty1',
            'code2',
            'qty2',
            'code3',
            'qty3',
            'edate',
            'ldate',
            'fareCode',
            'portCode'
        );
        $xml_input = '';
        if(!isset($input['custom']) || is_null($input['custom']) || $input['custom']=="false"){
            $xml_input = $this->otaCruiseSailAvailDefaultXml();
        }else{
            $xml_input = $this->otaCruiseSailAvailBuildXml($input);
        }
        $res = $this->execCurl($xml_input, true, $this->rootUrl."rest/OTA_CruiseSailAvailRQ", true);
        return response()->json($res);
    }

    private function otaCruiseSailAvailDefaultXml()
    {
        return '<?xml version="1.0" encoding="utf-8"?>
        <OTA_CruiseSailAvailRQ Version="1.0" xmlns="http://www.opentravel.org/OTA/2003/05">
            <POS>
                <Source>
                    <RequestorID Name="CASINO ALLOTMENT" Type="39"/>
                    <BookingChannel Type="1">
                        <CompanyName>OPENTRAVEL</CompanyName>
                    </BookingChannel>
                </Source>
            </POS>
            <GuestCounts>
                <GuestCount Code="10" Quantity="2"/>
                <GuestCount Code="8" Quantity="0"/>
                <GuestCount Code="7" Quantity="0"/>
            </GuestCounts>
            <SailingDateRange>
                <StartDateWindow EarliestDate="2018-02-20" LatestDate="2018-03-10"/>
                <EndDateWindow/>
            </SailingDateRange>
            <CruiseLinePrefs>
                <CruiseLinePref>
                <SearchQualifiers FareCode="RWCC B2M">
                    <Port PortCode="HKHKG"/>
                </SearchQualifiers>
                </CruiseLinePref>
            </CruiseLinePrefs>
        </OTA_CruiseSailAvailRQ>';
    }

    private function otaCruiseSailAvailBuildXml($input)
    {
        return '<?xml version="1.0" encoding="utf-8"?>
        <OTA_CruiseSailAvailRQ Version="1.0" xmlns="http://www.opentravel.org/OTA/2003/05">
            <POS>
                <Source>
                    <RequestorID Name="'.$input['name'].'" Type="'.$input['type'].'"/>
                    <BookingChannel Type="'.$input['channelType'].'">
                        <CompanyName>'.$input['comName'].'</CompanyName>
                    </BookingChannel>
                </Source>
            </POS>
            <GuestCounts>
                <GuestCount Code="'.$input['code1'].'" Quantity="'.$input['qty1'].'"/>
                <GuestCount Code="'.$input['code2'].'" Quantity="'.$input['qty2'].'"/>
                <GuestCount Code="'.$input['code3'].'" Quantity="'.$input['qty3'].'"/>
            </GuestCounts>
            <SailingDateRange>
                <StartDateWindow EarliestDate="'.$input['edate'].'" LatestDate="'.$input['ldate'].'"/>
                <EndDateWindow/>
            </SailingDateRange>
            <CruiseLinePrefs>
                <CruiseLinePref>
                <SearchQualifiers FareCode="'.$input['fareCode'].'">
                    <Port PortCode="'.$input['portCode'].'"/>
                </SearchQualifiers>
                </CruiseLinePref>
            </CruiseLinePrefs>
        </OTA_CruiseSailAvailRQ>';
    }

    //error
    public function otaCruiseFareAvail(Request $request)
    {
        $input = $request->only(
            'custom',
            'name',
            'type',
            'channelType',
            'comName',
            'age1',
            'code1',
            'qty1',
            'age2',
            'code2',
            'qty2',
            'age3',
            'code3',
            'qty3',
            'end',
            'portQty',
            'start',
            'status',
            'voyageID',
            'shipCode',
            'embarkTime',
            'departLoc',
            'debarkTime',
            'arrivLoc',
            'currency'
        );
        $xml_input = '';
        if(!isset($input['custom']) || is_null($input['custom']) || $input['custom']=="false"){
            $xml_input = $this->otaCruiseFareAvailDefaultXml();
        }else{
            $xml_input = $this->otaCruiseFareAvailBuildXml($input);
        }
        $res = $this->execCurl($xml_input, true, $this->rootUrl."rest/OTA_CruiseSailAvailRQ", false);
        return response()->json($res);
    }

    private function otaCruiseFareAvailDefaultXml()
    {
        return '<?xml version="1.0" encoding="utf-8"?>
        <OTA_CruiseFareAvailRQ Version="1.0" xmlns="http://www.opentravel.org/OTA/2003/05">
            <POS>
                <Source>
                    <RequestorID Name="CASINO ALLOTMENT" Type="39"/>
                    <BookingChannel Type="1">
                        <CompanyName>OPENTRAVEL</CompanyName>
                    </BookingChannel>
                </Source>
            </POS>
            <GuestCounts>
                <GuestCount Age="55" Code="10" Quantity="2"/>
                <GuestCount Age="3" Code="8" Quantity="0"/>
                <GuestCount Age="0" Code="7" Quantity="0"/>
            </GuestCounts>
            <SailingInfo>
                <SelectedSailing End="2017-09-17" PortsOfCallQuantity="" Start="2017-09-10" Status="36" VoyageID="SQ02170913">
                    <CruiseLine ShipCode="SSQ"/>
                    <DeparturePort EmbarkationTime="" LocationCode=""/>
                    <ArrivalPort DebarkationDateTime="" LocationCode=""/>
                </SelectedSailing>
                <Currency CurrencyCode="USD"/>
            </SailingInfo>
        </OTA_CruiseFareAvailRQ>';
    }

    private function otaCruiseFareAvailBuildXml($input)
    {
        return '<?xml version="1.0" encoding="utf-8"?>
        <OTA_CruiseFareAvailRQ Version="1.0" xmlns="http://www.opentravel.org/OTA/2003/05">
            <POS>
                <Source>
                <RequestorID Name="'.$input['name'].'" Type="'.$input['type'].'"/>
                <BookingChannel Type="'.$input['channelType'].'">
                    <CompanyName>'.$input['comName'].'</CompanyName>
                </BookingChannel>
                </Source>
            </POS>
            <GuestCounts>
                <GuestCount Age="'.$input['age1'].'" Code="'.$input['code1'].'" Quantity="'.$input['qty1'].'"/>
                <GuestCount Age="'.$input['age2'].'" Code="'.$input['code2'].'" Quantity="'.$input['qty2'].'"/>
                <GuestCount Age="'.$input['age3'].'" Code="'.$input['code3'].'" Quantity="'.$input['qty3'].'"/>
            </GuestCounts>
            <SailingInfo>
                <SelectedSailing End="'.$input['end'].'" PortsOfCallQuantity="'.$input['portQty'].'" Start="'.$input['start'].'" Status="'.$input['status'].'" VoyageID="'.$input['voyageID'].'">
                    <CruiseLine ShipCode="'.$input['shipCode'].'"/>
                    <DeparturePort EmbarkationTime="'.$input['embarkTime'].'" LocationCode="'.$input['departLoc'].'"/>
                    <ArrivalPort DebarkationDateTime="'.$input['debarkTime'].'" LocationCode="'.$input['arrivLoc'].'"/>
                </SelectedSailing>
                <Currency CurrencyCode="'.$input['currency'].'"/>
            </SailingInfo>
        </OTA_CruiseFareAvailRQ>';
    }
    
    public function otaCruiseCategoryAvail(Request $request)
    {
        $input = $request->only(
            'custom',
            'name',
            'type',
            'channelType',
            'comName',
            'age1',
            'code1',
            'qty1',
            'age2',
            'code2',
            'qty2',
            'age3',
            'code3',
            'qty3',
            'voyageID',
            'currency',
            'fareCode'
        );
        $xml_input = '';
        if(!isset($input['custom']) || is_null($input['custom']) || $input['custom']=="false"){
            $xml_input = $this->otaCruiseCategoryAvailDefaultXml();
        }else{
            $xml_input = $this->otaCruiseCategoryAvailBuildXml($input);
        }
        $res = $this->execCurl($xml_input, true, $this->rootUrl."rest/OTA_CruiseCategoryAvailRQ", true);
        return response()->json($res);
    }

    private function otaCruiseCategoryAvailDefaultXml()
    {
        return '<?xml version="1.0" encoding="utf-8"?>
        <OTA_CruiseCategoryAvailRQ Version="1.0" xmlns="http://www.opentravel.org/OTA/2003/05">
            <POS>
                <Source>
                <RequestorID Name="CASINO ALLOTMENT" Type="39"/>
                <BookingChannel Type="1">
                    <CompanyName>OPENTRAVEL</CompanyName>
                </BookingChannel>
                </Source>
            </POS>
            <GuestCounts>
                <GuestCount Age="55" Code="10" Quantity="2"/>
                <GuestCount Age="3" Code="8" Quantity="0"/>
                <GuestCount Age="0" Code="7" Quantity="0"/>
            </GuestCounts>
            <SailingInfo>
                <SelectedSailing VoyageID="SQ02170913"/>
                <Currency CurrencyCode="USD"/>
            </SailingInfo>
            <SelectedFare FareCode="RWCC B2M"/>
        </OTA_CruiseCategoryAvailRQ>';
    }

    private function otaCruiseCategoryAvailBuildXml($input)
    {
        return '<?xml version="1.0" encoding="utf-8"?>
        <OTA_CruiseCategoryAvailRQ Version="1.0" xmlns="http://www.opentravel.org/OTA/2003/05">
            <POS>
                <Source>
                <RequestorID Name="'.$input['name'].'" Type="'.$input['type'].'"/>
                <BookingChannel Type="'.$input['channelType'].'">
                    <CompanyName>'.$input['comName'].'</CompanyName>
                </BookingChannel>
                </Source>
            </POS>
            <GuestCounts>
                <GuestCount Age="'.$input['age1'].'" Code="'.$input['code1'].'" Quantity="'.$input['qty1'].'"/>
                <GuestCount Age="'.$input['age2'].'" Code="'.$input['code2'].'" Quantity="'.$input['qty2'].'"/>
                <GuestCount Age="'.$input['age3'].'" Code="'.$input['code3'].'" Quantity="'.$input['qty3'].'"/>
            </GuestCounts>
            <SailingInfo>
                <SelectedSailing VoyageID="'.$input['voyageID'].'"/>
                <Currency CurrencyCode="'.$input['currency'].'"/>
            </SailingInfo>
            <SelectedFare FareCode="'.$input['fareCode'].'"/>
        </OTA_CruiseCategoryAvailRQ>';
    }

    public function otaCruiseCabinAvailRQ(Request $request)
    {
        $xml_input = '';
        $res = $this->execCurl($xml_input, true, $this->rootUrl."rest/OTA_CruiseCategoryAvailRQ", true);
        return response()->json($res);
    }
    
    public function otaCruisePriceBookingRQ(Request $request)
    {
        $input = $request->only(
            'custom',
            'name',
            'type',
            'channelType',
            'comName',
            'age1',
            'qty1',
            'age2',
            'qty2',
            'age3',
            'qty3',
            'voyageID',
            'currency',
            'fareCode',
            'priceCatCode',
            'cabinNumber',
            'cabinStatus'
        );
        $xml_input = '';
        if(!isset($input['custom']) || is_null($input['custom']) || $input['custom']=="false"){
            $xml_input = $this->otaCruisePriceBookingDefaultXml();
        }else{
            $xml_input = $this->otaCruisePriceBookingBuildXml($input);
        }
        $res = $this->execCurl($xml_input, true, $this->rootUrl."rest/OTA_CruisePriceBookingRQ", true);
        return response()->json($res);
    }
    
    private function otaCruisePriceBookingDefaultXml()
    {
        return '<?xml version="1.0" encoding="utf-8"?>
        <OTA_CruisePriceBookingRQ Version="1.0" xmlns="http://www.opentravel.org/OTA/2003/05">
            <POS>
                <Source>
                <RequestorID Name="CASINO ALLOTMENT" Type="39"/>
                <BookingChannel Type="1">
                    <CompanyName>OPENTRAVEL</CompanyName>
                </BookingChannel>
                </Source>
            </POS>
            <GuestCounts>
                <GuestCount Age="55" Quantity="2"/>
                <GuestCount Age="3" Quantity="0"/>
                <GuestCount Age="0" Quantity="0"/>
            </GuestCounts>
            <SailingInfo>
                <SelectedSailing VoyageID="SQ02170913">
                <CruiseLine/>
                </SelectedSailing>
                <Currency CurrencyCode="USD"/>
                <SelectedCategory FareCode="RWCC B2M" PricedCategoryCode="CD">
                <SelectedCabin CabinNumber="GTY" Status="36"/>
                </SelectedCategory>
            </SailingInfo>
        </OTA_CruisePriceBookingRQ>';
    }

    private function otaCruisePriceBookingBuildXml($input)
    {
        return '<?xml version="1.0" encoding="utf-8"?>
        <OTA_CruisePriceBookingRQ Version="1.0" xmlns="http://www.opentravel.org/OTA/2003/05">
            <POS>
                <Source>
                <RequestorID Name="'.$input['name'].'" Type="'.$input['name'].'"/>
                <BookingChannel Type="'.$input['channelType'].'">
                    <CompanyName>'.$input['comName'].'</CompanyName>
                </BookingChannel>
                </Source>
            </POS>
            <GuestCounts>
                <GuestCount Age="'.$input['age1'].'" Quantity="'.$input['qty1'].'"/>
                <GuestCount Age="'.$input['age2'].'" Quantity="'.$input['qty2'].'"/>
                <GuestCount Age="'.$input['age3'].'" Quantity="'.$input['qty3'].'"/>
            </GuestCounts>
            <SailingInfo>
                <SelectedSailing VoyageID="'.$input['voyageID'].'">
                <CruiseLine/>
                </SelectedSailing>
                <Currency CurrencyCode="'.$input['currency'].'"/>
                <SelectedCategory FareCode="'.$input['fareCode'].'" PricedCategoryCode="'.$input['priceCatCode'].'">
                <SelectedCabin CabinNumber="'.$input['cabinNumber'].'" Status="'.$input['cabinStatus'].'"/>
                </SelectedCategory>
            </SailingInfo>
        </OTA_CruisePriceBookingRQ>';
    }
    
    public function otaCruiseBookRQ(Request $request)
    {
        $input = $request->only(
            'custom',
            'posName',
            'posType',
            'posComName',
            'sailInfoVoyageId',
            'sailInfoShipCode',
            'currency',
            'fareCode',
            'priceCatCode',
            'waitList',
            'guestExists',
            'requestGuest',
            'guestAge',
            'guestBod',
            'guestGender',
            'guestRef',
            'guestNat',
            'guestName',
            'guestMName',
            'guestSName',
            'guestDocId',
            'guestDocType',
            'guestEamil',
            'guestCCode',
            'guestPhone',
            'guestAddType',
            'guestAdd',
            'guestCity',
            'guestCountry',
            'guestCountryCode',
            'guestPostal',
            'guestState',
            'guestMemberId',
            'guestProgramId',
            'guestEFlag',
            'gContactName',
            'gContactMName',
            'gContactSName',
            'gContactEmail',
            'gContactCCode',
            'gContactPhone',
            'gTravDocId',
            'gTravDocIssuLoc',
            'gTravDocType',
            'gTravDocExpire'
        );
        $xml_input = '';
        if(!isset($input['custom']) || is_null($input['custom']) || $input['custom']=="false"){
            $xml_input = $this->otaCruiseBookDefaultXML();
        }else{
            $xml_input = $this->otaCruiseBookBuildXML($input);
        }
        // return $this->rootUrl."rest/OTA_CruiseBookRQ";
        $res = $this->execCurl($xml_input, true, $this->rootUrl."rest/OTA_CruiseBookRQ", true);
        return response()->json($res);
    }

    private function otaCruiseBookBuildXML($input)
    {
        return '<?xml version="1.0" encoding="utf-8"?>
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
    }

    private function otaCruiseBookDefaultXML()
    {
        return '<?xml version="1.0" encoding="utf-8"?>
        <OTA_CruiseBookRQ Version="1.0" xmlns="http://www.opentravel.org/OTA/2003/05">
            <POS>
                <Source>
                <RequestorID Name="CASINO ALLOTMENT" Type="39"/>
                <BookingChannel Type="1">
                    <CompanyName>OPENTRAVEL</CompanyName>
                </BookingChannel>
                </Source>
            </POS>
            <SailingInfo>
                <SelectedSailing VoyageID="WD02180302A">
                <CruiseLine ShipCode="WDR"/>
                </SelectedSailing>
                <Currency CurrencyCode="USD"/>
                <SelectedCategory FareCode="RWCC B2M" PricedCategoryCode="BDS" WaitlistIndicator="false"/>
            </SailingInfo>
            <ReservationInfo>
                <GuestDetails>
                    <GuestDetail GuestExistsIndicator="false" RepeatGuestIndicator="false">
                        <ContactInfo Age="29" BirthDate="1986-01-11" Gender="Male" GuestRefNumber="1" Nationality="HKG">
                            <PersonName>
                                <GivenName>Test</GivenName>
                                <MiddleName>M</MiddleName>
                                <Surname>Tester</Surname>
                                <Document DocID="4066601" DocType="2"/>
                            </PersonName>
                            <Email>zaw@manic.com.sg</Email>
                            <Telephone CountryAccessCode="1" PhoneNumber="406660000"/>
                            <Address Type="1">
                                <AddressLine>100 Andrews Avenue</AddressLine>
                                <CityName>Pasay</CityName>
                                <CountryName Code="HK">HK</CountryName>
                                <PostalCode>1309</PostalCode>
                                <StateProv>Metro Manila</StateProv>
                            </Address>
                        </ContactInfo>
                        <LoyaltyInfo MembershipID="4" ProgramID="PRINCIPLE CARD"/>
                        <ContactInfo EmergencyFlag="true">
                            <PersonName>
                                <GivenName>Testing</GivenName>
                                <MiddleName>M</MiddleName>
                                <Surname>Testing</Surname>
                            </PersonName>
                            <Email>zaw@manic.com.sg</Email>
                            <Telephone CountryAccessCode="1" PhoneNumber="3123213"/>
                        </ContactInfo>
                        <TravelDocument DocID="4066601" DocIssueLocation="Location" DocType="2" ExpireDate="2018-12-12"/>
                    </GuestDetail>
                </GuestDetails>
            </ReservationInfo>
        </OTA_CruiseBookRQ>';
    }

    public function otaCruiseBookingDocumentRQ(Request $request)
    {
        $input = $request->only(
            'custom',
            'type',
            'name',
            'rid',
            'indicator',
            'method',
            'destination'
        );
        $xml_input = '';
        if(!isset($input['custom']) || is_null($input['custom']) || $input['custom']=="false"){
            $xml_input = $this->otaCruiseBookDocDefaultXml();
        }else{
            $xml_input = $this->otaCruiseBookDocBuildXml($input);
        }
        $res = $this->execCurl($xml_input, true, $this->rootUrl."rest/OTA_CruiseBookingDocumentRQ", true);
        return response()->json($res);
    }

    private function otaCruiseBookDocDefaultXml()
    {
        return '<?xml version="1.0" encoding="utf-8"?>
        <OTA_CruiseBookingDocumentRQ Version="1.0" xmlns="http://www.opentravel.org/OTA/2003/05">
            <POS>
                <Source>
                <BookingChannel Type="1">
                    <CompanyName>OPENTRAVEL</CompanyName>
                </BookingChannel>
                </Source>
            </POS>
            <ReservationID ID="12526492"/>
            <CruiseDocument DefaultIndicator="true" DeliveryMethodCode="2" DocumentDestination="CLIENT"/>
        </OTA_CruiseBookingDocumentRQ>';
    }

    private function otaCruiseBookDocBuildXml($input)
    {
        return '<?xml version="1.0" encoding="utf-8"?>
        <OTA_CruiseBookingDocumentRQ Version="1.0" xmlns="http://www.opentravel.org/OTA/2003/05">
            <POS>
                <Source>
                <BookingChannel Type="'.$input['type'].'">
                    <CompanyName>'.$input['name'].'</CompanyName>
                </BookingChannel>
                </Source>
            </POS>
            <ReservationID ID="'.$input['rid'].'"/>
            <CruiseDocument DefaultIndicator="'.$input['indicator'].'" DeliveryMethodCode="'.$input['method'].'" DocumentDestination="'.$input['destination'].'"/>
        </OTA_CruiseBookingDocumentRQ>';
    }

    public function execCurl($xmlContent="", $isPost=false, $url=false, $parse=false) 
    {
        if($url===false){
            $SEAWARE_API_ROOT_PATH = "http://13.228.122.182:8081/ota/";
        }

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch,CURLOPT_POST, $isPost);                //0 for a get request
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        if($xmlContent!=="") {
            curl_setopt($ch, CURLOPT_POSTFIELDS, $xmlContent);
        }
        curl_setopt($ch, CURLOPT_HTTPHEADER, $this->headerInfo);
        $result = curl_exec($ch);
        if($parse===false){
            return $result;
        }
        $result = str_replace("vx:", "", $result);
        return simplexml_load_string($result);
    }
}
