<?php

//extract data from the post
//set POST variables

$DRS_ID = 'YKS';
$DRS_PWD = 'PASS';



// $url = 'http://52.77.149.78/DRS_XMLV3/Service.asmx/API_EditCustomerV2';
$url = 'http://52.77.149.78/DRSAPI_DEV/Service.asmx/API_EditCustomerV2';

$fields = array(
  'paraDrsID' => 'MANIC',
  'paraDrsPwd' => 'MANIC',
  'paraDRSWorkgroup' => 'MEML',
  'paraCid' => '1000044962',
  'paraCardTypeCode' => '99',
  'paraEmail' => 'zaw@manic.com.sg',
  'paraHOME' => '',
  'paraBUSINESS' => '',
  'paraMOBILE' => '+6591050491',
  'paraSMS' => '',
  'paraAdd1' => '114 Lavender Street',
  'paraAdd2' => '',
  'paraAdd3' => '',
  'paraCity' => 'Singapore',
  'paraState' => 'Singapore',
  'paraCountry' => 'Singapore',
  'paraPostcode' => '11141',
  'paraPreLanguage' => 'EN',
  'PF1Field' => '',
  'PF1Value' => '',
  'PF2Field' => '',
  'PF2Value' => '',
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