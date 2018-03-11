<?php

//extract data from the post
//set POST variables

$DRS_ID = 'MANIC';
$DRS_PWD = 'MANIC';



$url = 'http://52.77.149.78/DRS_XMLV3/Service.asmx/API_NewCustomer_V3';

$fields = array(
  'paraDrsID' => 'MANIC',
  'paraDrsPwd' => 'MANIC',
  'paraDRSWorkgroup' => 'MEML',
  'paraPreLang' => 'EN',
  'paraCardTypeCode' => '5',
  'paraCurrCode' => 'US',
  'paraTitle' => 'MR',
  'paraLName' => 'AUNG',
  'paraFName' => 'ZAW ZAW',
  'paraCNameLang' => 'ZH',
  'paraCTitle' => '',
  'paraCLName' => '',
  'paraCFName' => '',
  'paraGender' => 'M',
  'paraDOB' => '1986-03-04',
  'paraNAT' => 'SINGAPORE',
  'paraEmail' => 'zaw@manic.com.sg',
  'paraTELMobile' => '+6523232323',
  'paraDoc_Type' => 'PP',
  'paraDoc_No' => '298978594',
  'paraDoc_Country' => 'SINGAPORE',
  'paraDoc_IssueDT' => '2015-03-04',
  'paraDoc_ExpiryDT' => '2020-03-04',
  'paraAddressHomeLanguageCode' => 'EN',
  'paraAddDescription' => 'HOME',
  'paraAddressHomeLine1' => '1 test road',
  'paraAddressHomeLine2' => '',
  'paraAddressHomeLine3' => '',
  'paraAddCity' => 'Singapore',
  'paraAddState' => 'Singapore',
  'paraAddressHomeCountry' => 'Singapore',
  'paraAddPostCode' => '232323',
  'PF1Field' => 'OCC',
  'PF1Value' => 'Professional / Technical',
  'PF2Field' => 'BIZ2',
  'PF2Value' => 'Professional Services:Others',
  'PF3Field' => 'SPEP',
  'PF3Value' => 'YES',
  'PF4Field' => 'GRA',
  'PF4Value' => '180307\/IN',
  'PF5Field' => 'COM',
  'PF5Value' => 'IN\/180307\/OF',
  'PF6Field' => 'OA',
  'PF6Value' => 'OA_RWAS WEBSITE',
  'PF7Field' => 'CTLD',
  'PF7Value' => '20180307',
  'PF8Field' => 'CTRP',
  'PF8Value' => '20190307',
  'PF9Field' => '',
  'PF9Value' => '',
  'PF10Field' => '',
  'PF10Value' => ''
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