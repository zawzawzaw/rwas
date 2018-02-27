<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $drsUrl;
    protected $drsID;
    protected $drsPwd;
    protected $DRSWORKGROUP;
    protected $DRSCARDTYPE;
    protected $DRSCURRCODE;
    protected $DRSADDRGOMELANGCODE;

    public function __construct()
    {
        $this->drsUrl = "http://52.77.149.78/DRSAPI_DEV/Service.asmx/";
        $this->drsID = "MANIC";
        $this->drsPwd = "MANIC";
        $this->DRSWORKGROUP = "MEML";
        $this->DRSCARDTYPE = "5";
        $this->DRSCURRCODE = "US";
        $this->DRSADDRGOMELANGCODE = "EN";
    }

    /*
    // https://stackoverflow.com/questions/2726487/simplexmlelement-to-php-array
    public function SimpleXML2ArrayWithCDATASupport($xml){

        $array = (array)$xml;

        if (count($array) == 0) {
            $array = (string)$xml;  
        }

        if (is_array($array)) {
            //recursive Parser
            foreach ($array as $key => $value){
                if (is_object($value)) {
                    if(strpos(get_class($value),"SimpleXML")!==false){
                            $array[$key] = $this->SimpleXML2ArrayWithCDATASupport($value);
                    }
                } else {
                    $array[$key] = $this->SimpleXML2ArrayWithCDATASupport($value);
                }
            }
        }

        return $array;
    }
    */

    public function curlRequest($xmlContent, $url, $isPost=false, $parse=true)
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

        /*
         "address_state": {
            "0": "  "
        },
        */
        
        // $result = str_replace("\n", '', $result); // remove new lines
        // $result = str_replace("\r", '', $result); // remove carriage returns
        
        
        // return $this->SimpleXML2ArrayWithCDATASupport($result);

        $result = simplexml_load_string($result);
        return json_decode(json_encode($result));
        
        
    }

    public function buildDrsXMLContent($data)
    {
        $fields = '';
        foreach($data as $key=>$value) {
            $fields .= $key.'='.urlencode($value).'&';
        }
        rtrim($fields, '&');
        return $fields;
    }
}
