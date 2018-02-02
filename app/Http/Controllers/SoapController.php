<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisaninweb\SoapWrapper\SoapWrapper;
use App\Soap\Request\GetConversionAmount;
use App\Soap\Response\GetConversionAmountResponse;

class SoapController extends Controller
{
  /**
   * @var SoapWrapper
   */
  protected $soapWrapper;

  /**
   * SoapController constructor.
   *
   * @param SoapWrapper $soapWrapper
   */
  public function __construct(SoapWrapper $soapWrapper)
  {
    $this->soapWrapper = $soapWrapper;
  }

  /**
   * Use the SoapWrapper
   */
  public function show() 
  {
    $this->soapWrapper->add('API_AutoUA_Get_CustomerProfile_Format_Long', function ($service) {
      $service
        ->wsdl('http://10.236.9.77/DRS_XMLV3/service.asmx')                 // The WSDL url
        ->trace(true)            // Optional: (parameter: true/false)
        ->header()               // Optional: (parameters: $namespace,$name,$data,$mustunderstand,$actor)
        ->customHeader()         // Optional: (parameters: $customerHeader) Use this to add a custom SoapHeader or extended class                
        ->cookie()               // Optional: (parameters: $name,$value)
        ->location()             // Optional: (parameter: $location)
        ->certificate()          // Optional: (parameter: $certLocation)
        ->cache(WSDL_CACHE_NONE) // Optional: Set the WSDL cache
        ->options([
            'DRS_ID' => 'YKS',
            'DRS_PWD' => 'PASS',
            'DRS_WORKGROUP' => 'MEML'
        ])
    });

    // print_r($response);
    // $this->soapWrapper->add('Currency', function ($service) {
    //   $service
    //     ->wsdl('http://10.236.9.77/DRS_XMLV3/service.asmx')
    //     ->trace(true);
    // });

    // Without classmap
    $response = $this->soapWrapper->call('API_AutoUA_Get_CustomerProfile_Format_Long', [
      'paraDrsID' => 'YKS', 
      'paraDrsPwd'   => 'PASS', 
      'paraCid'     => '990785550',
      'paraEnquiryCurrCode'       => 'US',
      'paraLoadDefaultDRSifNoUA'       => '0'
    ]);

    print_r($response);

    // // With classmap
    // $response = $this->soapWrapper->call('Currency.GetConversionAmount', [
    //   new GetConversionAmount('USD', 'EUR', '2014-06-05', '1000')
    // ]);

    // print_r($response);
    // exit;
  }
}
