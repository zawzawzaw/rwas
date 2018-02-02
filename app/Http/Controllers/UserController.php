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

     home_country_code
     home_currency
     
     cc_points
     gp_points


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
   = details found in the api call API_NewCustomer_V3, renamed so the submitted parameter names are more descriptive
   = might have to clarify with Genting IT team on the possible values of some parameters
  
  preferred_language
  currency_code
  title
  last_name
  first_name
  chinese_title
  chinese_last_name
  chinese_first_name
  gender
  date_of_birth
  nationality
  email
  mobile_number
  doc_type
  doc_no
  doc_country
  doc_issue_date
  doc_expiry_date
  address_language_code
  address_description
  address_line_01
  address_line_02
  address_line_03
  address_city
  address_state
  address_country
  address_postal_code



  // parameter explaination


  preferred_language
  possible values = 2 letter country code (ex. US)
  
  currency_code
  possible values = 2 letter country code (ex. US)
  
  title
  possible value = MR, MISS, MRS
  
  last_name, first_name, chinese_title, chinese_last_name, chinese_first_name = regular fields
  
  gender
  possible values = M, F
  
  date_of_birth
  date format = MM/DD/YYYY (ex. 07/06/2017)
  
  nationality
  possible values = 2 letter country code (ex. US)
  
  email
  mobile_number
  
  // need to clarify with GENTING IT on the rest of the parameters
  doc_type, doc_no, doc_country, doc_issue_date, doc_expiry_date, address_language_code, address_description, address_line_01, address_line_02, address_line_03, address_city, address_state, address_country, address_postal_code

  


  // Where to send the data

  1. DRS
     API_NewCustomer_V3

       paraDrsID, paraDrsPwd, paraDRSWorkgroup = constants
       we will have 2 different sets of ID's, 1 for dev & 1 for prod

       paraPreLang, paraCardTypeCode, paraCurrCode, paraTitle, paraLName, paraFName, paraCNameLang, paraCTitle, paraCLName, paraCFName, paraGender, paraDOB, paraNAT, paraEmail, paraTELMobile, paraDoc_Type, paraDoc_No, paraDoc_Country, paraDoc_IssueDT, paraDoc_ExpiryDT, paraAddressHomeLanguageCode, paraAddDescription, paraAddressHomeLine1, paraAddressHomeLine2, paraAddressHomeLine3, paraAddCity, paraAddState, paraAddressHomeCountry, paraAddPostCode


       paraCardTypeCode = 71 (since new membe card type = classic)

       paraCNameLang = ZH (if chinese name is specified)

       paraDOB = format is YYYYMMDD (ex 19010920)
       
  

  */
 



  
  public function create_user()
  {
      //
      return 'success';
  }













  
  /*
   

   // parameters

   email
   home_number
   business_number
   mobile_number

   address_line_01
   address_line_02
   address_line_03
   address_city
   address_state
   address_country
   address_postcode

   preferred_language


   // parameter explaination

   preferred_language
   possible values = 2 letter country code (ex. US)






  // Where to send the data
  1. DRS
     API_EditCustomerV2
      
     paraDrsID, paraDrsPwd, paraDRSWorkgroup = constants
     we will have 2 different sets of ID's, 1 for dev & 1 for prod
  
     paraCid = user ID

     paraCardTypeCode = user card type (see card types.jpg)

    
     paraEmail, paraHOME, paraBUSINESS, paraMOBILE, paraSMS, paraAdd1, paraAdd2, paraAdd3, paraCity, paraState, paraCountry, paraPostcode, paraPreLanguage

    



  */
  public function edit_user()
  {
      //
      return 'success';
  }




  

  /*

  
  parameters
  
  username
  password




  // Where to send the data
  1. DRS
     API_AutoUA_PINVerify

     paraDrsID
     paraDrsPwd = constants
     we will have 2 different sets of ID's, 1 for dev & 1 for prod
    
     paraCid = user ID
     paraPIN = password

  */
  public function login_user()
  {
      //
      return 'success';
  }

}
