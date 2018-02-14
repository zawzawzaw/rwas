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

    public function __construct()
    {
        $this->drsUrl = "http://52.77.149.78/DRSAPI_DEV/Service.asmx/";
    }

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
