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
        if(filesize(public_path()."/token.json")<0){
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
        $xml_input ='<?xml version="1.0" encoding="utf-8"?>

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

                <StartDateWindow EarliestDate="2018-02-01" LatestDate="2017-05-17"/>

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

        $res = $this->execCurl($xml_input, true, $this->rootUrl."rest/OTA_CruiseSailAvailRQ", true);
        return response()->json($res);
    }
    
    public function otaCruiseFareAvail(Request $request)
    {
        $xml_input = '<?xml version="1.0" encoding="utf-8"?>

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
        $res = $this->execCurl($xml_input, true, $this->rootUrl."rest/OTA_CruiseSailAvailRQ", false);
        return response()->json($res);
    }
    //error
    public function otaCruiseCategoryAvail(Request $request)
    {
        $xml_input = '<?xml version="1.0" encoding="utf-8"?>

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
        $res = $this->execCurl($xml_input, true, $this->rootUrl."rest/OTA_CruiseCategoryAvailRQ", true);
        return response()->json($res);
    }

    public function otaCruiseCabinAvailRQ(Request $request)
    {
        $xml_input = '';
        $res = $this->execCurl($xml_input, true, $this->rootUrl."rest/OTA_CruiseCategoryAvailRQ", true);
        return response()->json($res);
    }
    
    public function otaCruisePriceBookingRQ(Request $request)
    {
        $xml_input = '<?xml version="1.0" encoding="utf-8"?>

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
        $res = $this->execCurl($xml_input, true, $this->rootUrl."rest/OTA_CruisePriceBookingRQ", false);
        return response()->json($res);
    }

    public function otaCruiseBookRQ(Request $request)
    {
        $xml_input = '<?xml version="1.0" encoding="utf-8"?>
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
                <SelectedSailing VoyageID="SQ02170913">
                <CruiseLine ShipCode="SSQ"/>
                </SelectedSailing>
                <Currency CurrencyCode="USD"/>
                <SelectedCategory FareCode="RWCC B2M" PricedCategoryCode="CD" WaitlistIndicator="false"/>
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
                    <Email>peter.parungao@starcruises.com</Email>
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
                    <Email>test@testers.com</Email>
                    <Telephone CountryAccessCode="1" PhoneNumber="3123213"/>
                    </ContactInfo>
                    <TravelDocument DocID="4066601" DocIssueLocation="Location" DocType="2" ExpireDate="2018-12-12"/>
                </GuestDetail>
                <GuestDetail GuestExistsIndicator="false" RepeatGuestIndicator="false">
                    <ContactInfo Age="29" BirthDate="1986-01-11" Gender="Male" GuestRefNumber="2" Nationality="HKG">
                    <PersonName>
                        <GivenName>Tester</GivenName>
                        <MiddleName>M</MiddleName>
                        <Surname>Testerdin</Surname>
                        <Document DocID="40222" DocType="2"/>
                    </PersonName>
                    <Email>john.rillorta@starcruises.com</Email>
                    <Telephone CountryAccessCode="1" PhoneNumber="223213"/>
                    <Address Type="1">
                        <AddressLine>100 Andrews Avenue</AddressLine>
                        <CityName>Pasay</CityName>
                        <CountryName Code="HK">HK</CountryName>
                        <PostalCode>1309</PostalCode>
                        <StateProv>Metro Manila</StateProv>
                    </Address>
                    </ContactInfo>
                    <ContactInfo EmergencyFlag="true">
                    <PersonName>
                        <GivenName>Testing</GivenName>
                        <MiddleName>M</MiddleName>
                        <Surname>Testing</Surname>
                    </PersonName>
                    <Email>test@testers.com</Email>
                    <Telephone CountryAccessCode="1" PhoneNumber="3123213"/>
                    </ContactInfo>
                    <TravelDocument DocID="4466417" DocIssueLocation="Location" DocType="2" ExpireDate="2018-12-12"/>
                </GuestDetail>
                </GuestDetails>
            </ReservationInfo>
        </OTA_CruiseBookRQ>';
        $res = $this->execCurl($xml_input, true, $this->rootUrl."rest/OTA_CruiseBookRQ", true);
        return response()->json($res);
    }

    public function otaCruiseBookingDocumentRQ(Request $request)
    {
        $xml_input = '<?xml version="1.0" encoding="utf-8"?>
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
        $res = $this->execCurl($xml_input, true, $this->rootUrl."rest/OTA_CruiseBookingDocumentRQ", true);
        return response()->json($res);
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
