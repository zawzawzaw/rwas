<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{

  /*
  call this once per session & store the data in session variables
  should not keep calling DRS for data that will not change

  // Where to get the data
  

  1. Session variables
      logged_in_member_id

  2. DRS
     API_AutoUA_Get_CustomerProfile_Format_Long
     API_AutoUA_Get_CustomerProfile_Format1
    
      CustomerName
      CustomerPreferredLanguage
    
      CustomerTypeCode
      CustomerCurrencyCode
        
        Point
          SP = genting point
          ?? = cruise credits
          TIER = tier points

  */
  
  public function get_user()
  {
      
    $output_data = array(
      "details" => array(
        "name" => "Michael",
        "membership_id" => "88888888",
        "home_country_code" => "SG",
        "home_country_name" => "Singapore",
        "home_currency" => "SGD",
      ),
      "points" => array(
        "cc" => 88,
        "gp" => 8888,
      ),
      "tier" => array(
        "tier_code" => 88,
        "tier_name" => "classic",
        "tier_points" => 88,
        "tier_points_max" => 500,
      ),

      "current_bookings" => 2,
    );

    $output_json = json_encode($output_data);

    return $output_json;
  }



  
  /*
  parameters
   = all the parameters found in the api call API_NewCustomer_V3
  



  // Where to get the data
  1. DRS
     API_NewCustomer_V3

       paraPreLang
       paraCardTypeCode
       paraCurrCode

       paraTitle
       paraLName
       paraFName
       paraGender
       paraDOB
       paraNAT
       paraEmail

  */
  
  public function create_user()
  {
      //
      return 'success';
  }

  
  /*

  // Where to get the data
  1. DRS
     API_EditCustomerV2
       paraCid

  */
  public function edit_user()
  {
      //
      return 'success';
  }


  /*

  // Where to get the data
  1. DRS
     API_AutoUA_PINVerify
       paraCid
       paraPIN

  */
  public function login_user()
  {
      //
      return 'success';
  }

}
