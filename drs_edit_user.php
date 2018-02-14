<?php

//extract data from the post
//set POST variables

$DRS_ID = 'YKS';
$DRS_PWD = 'PASS';



$url = 'http://52.77.149.78/DRSAPI_DEV/Service.asmx/API_EditCustomerV2';

$fields = array(
  'paraDrsID' => urlencode('MANIC'),
  'paraDrsPwd' => urlencode('MANIC'),
  'paraDRSWorkgroup' => 'MEML',
  'paraCid' => '29',
  'paraCardTypeCode' => '99',
  'paraEmail' => urlencode('zaw@manic.com.sg'),
  'paraHOME' => urlencode(''),
  'paraBUSINESS' => urlencode(''),
  'paraMOBILE' => urlencode('+6591050491'),
  'paraSMS' => urlencode(''),
  'paraAdd1' => urlencode('114 Lavender Street'),
  'paraAdd2' => urlencode(''),
  'paraAdd3' => urlencode(''),
  'paraCity' => urlencode('Singapore'),
  'paraState' => urlencode('Singapore'),
  'paraCountry' => urlencode('Singapore'),
  'paraPostcode' => urlencode('11141'),
  'paraPreLanguage' => urlencode('EN'),
  'PF1Field' => 'OCC',
  'PF1Value' => 'Business owner/Partner',
  'PF2Field' => 'BIZ2',
  'PF2Value' => 'Agriculture, Mining &amp; Forestry',
  'PF3Field' => 'SPEP',
  'PF3Value' => 'Yes',
  'PF4Field' => 'GRA',
  'PF4Value' => '051017/OPT IN/KIOSK',
  'PF5Field' => 'COM',
  'PF5Value' => 'IN/180206/KIOSK',
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