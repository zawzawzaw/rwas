<?php

//extract data from the post
//set POST variables

$DRS_ID = 'YKS';
$DRS_PWD = 'PASS';



$url = 'http://52.77.149.78/DRSAPI_DEV/Service.asmx/API_AutoUA_PINChange';

$fields = array(
  'paraDrsID' => urlencode('MANIC'),
  'paraDrsPwd' => urlencode('MANIC'),
  'paraCid' => urlencode('29'),
  'paraPINNew' => urlencode('333333'),
  'paraPINOld' => urlencode('222222')
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