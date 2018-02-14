<?php

//extract data from the post
//set POST variables

$DRS_ID = 'MANIC';
$DRS_PWD = 'MANIC';



$url = 'http://52.77.149.78/DRSAPI_DEV/Service.asmx/API_NewCustomer_V3';

$fields = array(
  'paraDrsID' => 'MANIC',
  'paraDrsPwd' => 'MANIC',
  'paraDRSWorkgroup' => 'MEML',
  'paraPreLang' => 'EN',
  'paraCardTypeCode' => '99',
  'paraCurrCode' => 'US',
  'paraTitle' => 'MR',
  'paraLName' => 'AUNG',
  'paraFName' => 'ZAW ZAW',
  'paraCNameLang' => 'ZH',
  'paraCTitle' => '',
  'paraCLName' => '',
  'paraCFName' => '',
  'paraGender' => 'M',
  'paraDOB' => '1986-07-29',
  'paraNAT' => 'SINGAPORE',
  'paraEmail' => 'zawzawzaw@gmail.com',
  'paraTELMobile' => '6591050491',
  'paraDoc_Type' => 'PP',
  'paraDoc_No' => 'MA813807',
  'paraDoc_Country' => 'SINGAPORE',
  'paraDoc_IssueDT' => '10-02-2015',
  'paraDoc_ExpiryDT' => '10-02-2020',
  'paraAddressHomeLanguageCode' => 'EN',
  'paraAddDescription' => '',
  'paraAddressHomeLine1' => '114 LAVENDER STREET',
  'paraAddressHomeLine2' => '',
  'paraAddressHomeLine3' => '',
  'paraAddCity' => 'SINGAPORE',
  'paraAddState' => '',
  'paraAddressHomeCountry' => 'SINGAPORE',
  'paraAddPostCode' => '338729',
  'PF1Field' => 'OCC',
  'PF1Value' => 'Professional / Technical',
  'PF2Field' => 'BIZ2',
  'PF2Value' => 'Professional Services:Others',
  'PF3Field' => 'SPEP',
  'PF3Value' => 'No',
  'PF4Field' => 'GRA',
  'PF4Value' => '180213/OUT',
  'PF5Field' => 'COM',
  'PF5Value' => 'IN/180213/OF',
  'PF6Field' => 'GIFT',
  'PF6Value' => '3_BA',
  'PF7Field' => 'LUCK',
  'PF7Value' => 'Y_051017',
  'PF8Field' => 'PU',
  'PF8Value' => '180213/KIOSK',
  'PF9Field' => 'RWEC',
  'PF9Value' => '400.89',
  'PF10Field' => 'RWRC',
  'PF10Value' => '251'
);

// $url = 'http://52.77.149.78/DRSAPI_DEV/Service.asmx/API_AutoUA_PINVerify';
// $fields = array(
//   "paraDrsID" => $DRS_ID,
//   "paraDrsPwd" => $DRS_PWD,

//   // test account
//   "paraCid" => "19000438",
//   "paraPIN" => "222222",
// );               

//url-ify the data for the POST
foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
rtrim($fields_string, '&');

//open connection
$ch = curl_init();

//set the url, number of POST vars, POST data
curl_setopt($ch,CURLOPT_URL, $url);
curl_setopt($ch,CURLOPT_POST, count($fields));
curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);

//execute post
$result = curl_exec($ch);


var_dump($result);

//close connection
curl_close($ch);

?>