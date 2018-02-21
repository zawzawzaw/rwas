<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageControllerTest extends Controller
{


  // home page content of logged in member
  // without booking
  
  public function get_home_content()
  {
    
    $output_data = array(

      "deal_content" => array(

        // only the copy text, actual best redeemable cruise must be retrieved from /cruise/get_best_redeemable_cruise
        "best_redeemable_cruise_copy" => array(
          "title" => "You can redeem a free cruise",
          "learn_more_cta_link" => "Find out more",
        ),

        "latest_news" => array(
          "title" => "What's happening",
          "learn_more_cta_copy" => "Find out more",
        ),
        "promotion_array" => array(
          array(
            "title" => "Hot Deal 1",
            "copy" => "",
            "promotion_id" => "12341234",
          ),
          array(
            "title" => "Hot Deal 2",
            "copy" => "",
            "promotion_id" => "12341234",
          ),
          array(
            "title" => "Hot Deal 3",
            "copy" => "",
            "promotion_id" => "12341234",
          ),
        ),
      ),

      "membership_content" => array(
        "title" => "",
        "copy" => "",
        "learn_more_cta_copy" => "Find out more",
        "learn_more_cta_link" => "https://www.google.com.sg",
      ),

      "ship_content" => array(
        "ship_array" => array(
          array(
            "name" => "Ship 01",
            "ship_code" => "SSQ",
          ),
          array(
            "name" => "Ship 02",
            "ship_code" => "SSS",
          ),
        ),
      ),
    );

    $output_json = json_encode($output_data);

    return $output_json;
  }


  // home page content of non-logged in users

  public function get_home_content_nonmember()
  {
    $output_data = array(
      "banner_content" => array(
        "banner_array" => array(
          array(
            "title" => "Plan a cruise trip with genting rewards at sea",
            "subtitle" => "Find out membership benefits",
            "image" => "",
            "image_tablet" => "",
            "image_mobile" => "http://52.77.205.209/api/public/temp_images/home/banner-image-01-mobile.png",
          ),
          array(
            "title" => "Plan a cruise trip with genting rewards at sea 2",
            "subtitle" => "Find out membership benefits",
            "image" => "",
            "image_tablet" => "",
            "image_mobile" => "http://52.77.205.209/api/public/temp_images/home/banner-image-02-mobile.png",
          ),
          array(
            "title" => "Plan a cruise trip with genting rewards at sea 3",
            "subtitle" => "Find out membership benefits",
            "image" => "",
            "image_tablet" => "",
            "image_mobile" => "http://52.77.205.209/api/public/temp_images/home/banner-image-03-mobile.png",
          ),
        ),
      ),
      "membership_content" => array(
        "title" => "Membership benefits & how to use",
        "item_array" => array(
          array(
            "icon" => "http://52.77.205.209/api/public/temp_images/home/icon-01.png",
            "title" => "Benefit 1",
          ),
          array(
            "icon" => "http://52.77.205.209/api/public/temp_images/home/icon-02.png",
            "title" => "Benefit 2",
          ),
          array(
            "icon" => "http://52.77.205.209/api/public/temp_images/home/icon-03.png",
            "title" => "Benefit 3",
          ),
          array(
            "icon" => "http://52.77.205.209/api/public/temp_images/home/icon-01.png",
            "title" => "Benefit 4",
          ),
          array(
            "icon" => "http://52.77.205.209/api/public/temp_images/home/icon-02.png",
            "title" => "Save",
          ),
          array(
            "icon" => "http://52.77.205.209/api/public/temp_images/home/icon-03.png",
            "title" => "Spend",
          ),
          array(
            "icon" => "http://52.77.205.209/api/public/temp_images/home/icon-01.png",
            "title" => "Enjoy",
          ),
        ),
        "cta_array" => array(
          "read_more_copy" => "Read more",
          "join_now_copy" => "Join now",
        ),
      ),
      "ship_content" => array(
        "ship_array" => array(
          array(
            "name" => "Ship 01",
            "ship_code" => "SSQ",
          ),
          array(
            "name" => "Ship 02",
            "ship_code" => "SSS",
          ),
        ),
      ),
      "faq_content" => array(
        "title" => "Have more questions?",
        "link_array" => array(
          array(
            "copy" => "FAQ",
            "url" => "http://www.google.com",
          ),
          array(
            "copy" => "RWAS Membership",
            "url" => "http://www.google.com",
          ),
          array(
            "copy" => "Contact",
            "url" => "http://www.google.com",
          ),
        ),
        "join_cta_copy" => "Join Now",
      ),
    );
  

    $output_json = json_encode($output_data);

    return $output_json;
  }

  
  

  
  




  public function get_registration_content()
  {
    $output_data = array(

      "title_data" => array(
        "name" => "Title*",
        "placeholder" => "Select one",
        "options" => array(
          array(
            "label" => "Mr.",
            "value" => "MR",
          ),
          array(
            "label" => "Ms.",
            "value" => "MS",
          ),
          array(
            "label" => "Mdm.",
            "value" => "MDM",
          ),
        ),
      ),

      "first_name_data" => array(
        "name" => "First Name*",
        "placeholder" => "",
      ),

      "last_name_data" => array(
        "name" => "Last Name*",
        "placeholder" => "",
      ),

      "gender_data" => array(
        "name" => "Gender*",
        "placeholder" => "Select one",
        "options" => array(
          array(
            "label" => "M",
            "value" => "M",
          ),
          array(
            "label" => "F",
            "value" => "F",
          ),
        ),
      ),

      "date_of_birth_data" => array(
        "name" => "Date of Birth*",
        "placeholder" => "DD/MM/YYYY",
      ),

      "nationality_data" => array(
        "name" => "Nationality*",
        "placeholder" => "Select one",
        "options" => array(
          array(
            "label" => "MAINLAND CHINA",
            "value" => "86",
          ),
          array(
            "label" => "HONG KONG SPECIAL ADMINSTRATIVE REGION",
            "value" => "852",
          ),
          array(
            "label" => "INDONESIA",
            "value" => "62",
          ),
          array(
            "label" => "MALAYSIA",
            "value" => "60",
          ),
          array(
            "label" => "SINGAPORE",
            "value" => "65",
          ),
          array(
            "label" => "TAIWAN",
            "value" => "886",
          ),
          array(
            "label" => "THAILAND",
            "value" => "66",
          ),
          array(
            "label" => "CANADA",
            "value" => "00",
          ),
          array(
            "label" => "USA",
            "value" => "01",
          ),
          array(
            "label" => "MALDIVES",
            "value" => "06",
          ),
          array(
            "label" => "RUSSIA",
            "value" => "07",
          ),
          array(
            "label" => "EGYPT",
            "value" => "20",
          ),
          array(
            "label" => "ALGERIA",
            "value" => "21",
          ),
          array(
            "label" => "MAURITIUS",
            "value" => "23",
          ),
          array(
            "label" => "ZIMBABWE",
            "value" => "26",
          ),
          array(
            "label" => "SOUTH AFRICA",
            "value" => "27",
          ),
          array(
            "label" => "NETHERLANDS",
            "value" => "31",
          ),
          array(
            "label" => "BELGIUM",
            "value" => "32",
          ),
          array(
            "label" => "FRANCE",
            "value" => "33",
          ),
          array(
            "label" => "SPAIN",
            "value" => "34",
          ),
          array(
            "label" => "MALTA",
            "value" => "35",
          ),
          array(
            "label" => "HUNGARY",
            "value" => "36",
          ),
          array(
            "label" => "ITALY",
            "value" => "39",
          ),
          array(
            "label" => "ROMANIA",
            "value" => "40",
          ),
          array(
            "label" => "SWITZERLAND",
            "value" => "41",
          ),
          array(
            "label" => "AUSTRIA",
            "value" => "43",
          ),
          array(
            "label" => "UNITED KINGDOM",
            "value" => "44",
          ),
          array(
            "label" => "DENMARK",
            "value" => "45",
          ),
          array(
            "label" => "SWEDEN",
            "value" => "46",
          ),
          array(
            "label" => "NORWAY",
            "value" => "47",
          ),
          array(
            "label" => "POLAND",
            "value" => "48",
          ),
          array(
            "label" => "GERMANY",
            "value" => "49",
          ),
          array(
            "label" => "HONDURAS",
            "value" => "50",
          ),
          array(
            "label" => "PORTUGAL",
            "value" => "51",
          ),
          array(
            "label" => "MEXICO",
            "value" => "52",
          ),
          array(
            "label" => "MACAU SPECIAL ADMINISTRATIVE REGION",
            "value" => "53",
          ),
          array(
            "label" => "ARGENTINA",
            "value" => "54",
          ),
          array(
            "label" => "BRAZIL",
            "value" => "55",
          ),
          array(
            "label" => "CHILE",
            "value" => "56",
          ),
          array(
            "label" => "FINLAND",
            "value" => "58",
          ),
          array(
            "label" => "AUSTRALIA",
            "value" => "61",
          ),
          array(
            "label" => "PHILIPPINES",
            "value" => "63",
          ),
          array(
            "label" => "NEW ZEALAND",
            "value" => "64",
          ),
          array(
            "label" => "THAILAND",
            "value" => "66",
          ),
          array(
            "label" => "BRUNEI",
            "value" => "67",
          ),
          array(
            "label" => "IRELAND",
            "value" => "72",
          ),
          array(
            "label" => "PAPUA N. GUINEA",
            "value" => "75",
          ),
          array(
            "label" => "PUERTO RICO",
            "value" => "78",
          ),
          array(
            "label" => "KOREA",
            "value" => "80",
          ),
          array(
            "label" => "JAPAN",
            "value" => "81",
          ),
          array(
            "label" => "VIETNAM",
            "value" => "84",
          ),
          array(
            "label" => "BANGLADESH",
            "value" => "89",
          ),
          array(
            "label" => "NAURU",
            "value" => "90",
          ),
          array(
            "label" => "INDIA",
            "value" => "91",
          ),
          array(
            "label" => "PAKISTAN",
            "value" => "92",
          ),
          array(
            "label" => "SRI LANKA",
            "value" => "94",
          ),
          array(
            "label" => "MYANMAR",
            "value" => "95",
          ),
          array(
            "label" => "SAUDI ARABIA AND KUWAIT",
            "value" => "96",
          ),
          array(
            "label" => "UAE",
            "value" => "97",
          ),
          array(
            "label" => "IRAN",
            "value" => "98",
          ),
          array(
            "label" => "CAMBODIA",
            "value" => "855",
          ),
        ),
      ),

      "doc_type_data" => array(
        "name" => "Identification type",
        "placeholder" => "Select one",
        "options" => array(
          array(
            "label" => "Identification Card",
            "value" => "IC",
          ),
          array(
            "label" => "Passport",
            "value" => "PP",
          ),
        ),
      ),
      
      "doc_no_data" => array(
        "name" => "ID or Passport number",
        "placeholder" => "",
      ),

      "doc_country_data" => array(
        "name" => "Travel document issued by",
        "placeholder" => "Select one",
        "options" => array(
          array(
            "label" => "MAINLAND CHINA",
            "value" => "MAINLAND CHINA",
          ),
          array(
            "label" => "HONG KONG SPECIAL ADMINSTRATIVE REGION",
            "value" => "HONG KONG SPECIAL ADMINSTRATIVE REGION",
          ),
          array(
            "label" => "INDONESIA",
            "value" => "INDONESIA",
          ),
          array(
            "label" => "MALAYSIA",
            "value" => "MALAYSIA",
          ),
          array(
            "label" => "SINGAPORE",
            "value" => "SINGAPORE",
          ),
          array(
            "label" => "TAIWAN",
            "value" => "TAIWAN",
          ),
          array(
            "label" => "THAILAND",
            "value" => "THAILAND",
          ),
          array(
            "label" => "CANADA",
            "value" => "CANADA",
          ),
          array(
            "label" => "USA",
            "value" => "USA",
          ),
          array(
            "label" => "MALDIVES",
            "value" => "MALDIVES",
          ),
          array(
            "label" => "RUSSIA",
            "value" => "RUSSIA",
          ),
          array(
            "label" => "EGYPT",
            "value" => "EGYPT",
          ),
          array(
            "label" => "ALGERIA",
            "value" => "ALGERIA",
          ),
          array(
            "label" => "MAURITIUS",
            "value" => "MAURITIUS",
          ),
          array(
            "label" => "ZIMBABWE",
            "value" => "ZIMBABWE",
          ),
          array(
            "label" => "SOUTH AFRICA",
            "value" => "SOUTH AFRICA",
          ),
          array(
            "label" => "NETHERLANDS",
            "value" => "NETHERLANDS",
          ),
          array(
            "label" => "BELGIUM",
            "value" => "BELGIUM",
          ),
          array(
            "label" => "FRANCE",
            "value" => "FRANCE",
          ),
          array(
            "label" => "SPAIN",
            "value" => "SPAIN",
          ),
          array(
            "label" => "MALTA",
            "value" => "MALTA",
          ),
          array(
            "label" => "HUNGARY",
            "value" => "HUNGARY",
          ),
          array(
            "label" => "ITALY",
            "value" => "ITALY",
          ),
          array(
            "label" => "ROMANIA",
            "value" => "ROMANIA",
          ),
          array(
            "label" => "SWITZERLAND",
            "value" => "SWITZERLAND",
          ),
          array(
            "label" => "AUSTRIA",
            "value" => "AUSTRIA",
          ),
          array(
            "label" => "UNITED KINGDOM",
            "value" => "UNITED KINGDOM",
          ),
          array(
            "label" => "DENMARK",
            "value" => "DENMARK",
          ),
          array(
            "label" => "SWEDEN",
            "value" => "SWEDEN",
          ),
          array(
            "label" => "NORWAY",
            "value" => "NORWAY",
          ),
          array(
            "label" => "POLAND",
            "value" => "POLAND",
          ),
          array(
            "label" => "GERMANY",
            "value" => "GERMANY",
          ),
          array(
            "label" => "HONDURAS",
            "value" => "HONDURAS",
          ),
          array(
            "label" => "PORTUGAL",
            "value" => "PORTUGAL",
          ),
          array(
            "label" => "MEXICO",
            "value" => "MEXICO",
          ),
          array(
            "label" => "MACAU SPECIAL ADMINISTRATIVE REGION",
            "value" => "MACAU SPECIAL ADMINISTRATIVE REGION",
          ),
          array(
            "label" => "ARGENTINA",
            "value" => "ARGENTINA",
          ),
          array(
            "label" => "BRAZIL",
            "value" => "BRAZIL",
          ),
          array(
            "label" => "CHILE",
            "value" => "CHILE",
          ),
          array(
            "label" => "FINLAND",
            "value" => "FINLAND",
          ),
          array(
            "label" => "AUSTRALIA",
            "value" => "AUSTRALIA",
          ),
          array(
            "label" => "PHILIPPINES",
            "value" => "PHILIPPINES",
          ),
          array(
            "label" => "NEW ZEALAND",
            "value" => "NEW ZEALAND",
          ),
          array(
            "label" => "THAILAND",
            "value" => "THAILAND",
          ),
          array(
            "label" => "BRUNEI",
            "value" => "BRUNEI",
          ),
          array(
            "label" => "IRELAND",
            "value" => "IRELAND",
          ),
          array(
            "label" => "PAPUA N. GUINEA",
            "value" => "PAPUA N. GUINEA",
          ),
          array(
            "label" => "PUERTO RICO",
            "value" => "PUERTO RICO",
          ),
          array(
            "label" => "KOREA",
            "value" => "KOREA",
          ),
          array(
            "label" => "JAPAN",
            "value" => "JAPAN",
          ),
          array(
            "label" => "VIETNAM",
            "value" => "VIETNAM",
          ),
          array(
            "label" => "BANGLADESH",
            "value" => "BANGLADESH",
          ),
          array(
            "label" => "NAURU",
            "value" => "NAURU",
          ),
          array(
            "label" => "INDIA",
            "value" => "INDIA",
          ),
          array(
            "label" => "PAKISTAN",
            "value" => "PAKISTAN",
          ),
          array(
            "label" => "SRI LANKA",
            "value" => "SRI LANKA",
          ),
          array(
            "label" => "MYANMAR",
            "value" => "MYANMAR",
          ),
          array(
            "label" => "SAUDI ARABIA AND KUWAIT",
            "value" => "SAUDI ARABIA AND KUWAIT",
          ),
          array(
            "label" => "UAE",
            "value" => "UAE",
          ),
          array(
            "label" => "IRAN",
            "value" => "IRAN",
          ),
          array(
            "label" => "CAMBODIA",
            "value" => "CAMBODIA",
          ),
        ),
      ),

      "doc_issue_date_data" => array(
        "name" => "Travel document issue date",
        "placeholder" => "DD/MM/YYYY",
      ),

      "doc_expiry_date_data" => array(
        "name" => "Travel document expiry date",
        "placeholder" => "DD/MM/YYYY",
      ),

      "occupation_data" => array(
        "name" => "Occupation",
        "placeholder" => "Select one",
        "options" => array(
          array(
            "label" => "Business owner/Partner",
            "value" => "Business owner/Partner",
          ),
          array(
            "label" => "Other office worker",
            "value" => "Other office worker",
          ),
          array(
            "label" => "Professional / Technical",
            "value" => "Professional / Technical",
          ),
          array(
            "label" => "Retired,unemployed,housewife,student",
            "value" => "Retired,unemployed,housewife,student",
          ),
          array(
            "label" => "Senior/Executive management",
            "value" => "Senior/Executive management",
          ),
          array(
            "label" => "Others",
            "value" => "Others",
          ),

        ),
      ),

      "nature_of_business_data" => array(
        "name" => "Nature of business",
        "placeholder" => "Select one",
        "options" => array(
          array(
            "label" => "Agriculture, Mining & Forestry",
            "value" => "Agriculture, Mining & Forestry",
          ),
          array(
            "label" => "Construction/Transpo/Comm/Utililities",
            "value" => "Construction/Transpo/Comm/Utililities",
          ),
          array(
            "label" => "Financial Services - Banking, Insurance",
            "value" => "Financial Services - Banking, Insurance",
          ),
          array(
            "label" => "Financial Services - Other",
            "value" => "Financial Services - Other",
          ),
          array(
            "label" => "General Business/Self Employed",
            "value" => "General Business/Self Employed",
          ),
          array(
            "label" => "Government/Public Sector",
            "value" => "Government/Public Sector",
          ),
          array(
            "label" => "Hospitality & Tourism",
            "value" => "Hospitality & Tourism",
          ),
          array(
            "label" => "Non-Profit/Charity Organization",
            "value" => "Non-Profit/Charity Organization",
          ),
          array(
            "label" => "Others/None",
            "value" => "Others/None",
          ),
          array(
            "label" => "Professional Services:Law,Accounting",
            "value" => "Professional Services:Law,Accounting",
          ),
          array(
            "label" => "Professional Services:Others",
            "value" => "Professional Services:Others",
          ),
          array(
            "label" => "Real Estate",
            "value" => "Real Estate",
          ),
          array(
            "label" => "Manufacturing:Defense Goods",
            "value" => "Manufacturing:Defense Goods",
          ),
          array(
            "label" => "Trading Business:Defense Goods",
            "value" => "Trading Business:Defense Goods",
          ),
          array(
            "label" => "Trading Business:Import/Export",
            "value" => "Trading Business:Import/Export",
          ),
          array(
            "label" => "Manufacturing:Jewelry/Precious Metals",
            "value" => "Manufacturing:Jewelry/Precious Metals",
          ),
          array(
            "label" => "Trading Business:Jewelry/Precious Metals",
            "value" => "Trading Business:Jewelry/Precious Metals",
          ),
          array(
            "label" => "Trading Business:Others",
            "value" => "Trading Business:Others",
          ),
          array(
            "label" => "Manufacturing:Others",
            "value" => "Manufacturing:Others",
          ),
        ),
      ),

      "email_data" => array(
        "name" => "Email address*",
        "placeholder" => "",
      ),

      "mobile_country_data" => array(
        "name" => "Mobile*",
        "placeholder" => "Select one",
        "options" => array(
          array(
            "label" => "",
            "value" => "",
          ),
        ),
      ),

      "mobile_number_data" => array(
        "name" => "",
        "placeholder" => "",
      ),

      "address_line_01_data" => array(
        "name" => "Address*",
        "placeholder" => "",
      ),

      "address_country_data" => array(
        "name" => "Country",
        "placeholder" => "Select one",
        "options" => array(
          array(
            "label" => "MAINLAND CHINA",
            "value" => "MAINLAND CHINA",
          ),
          array(
            "label" => "HONG KONG SPECIAL ADMINSTRATIVE REGION",
            "value" => "HONG KONG SPECIAL ADMINSTRATIVE REGION",
          ),
          array(
            "label" => "INDONESIA",
            "value" => "INDONESIA",
          ),
          array(
            "label" => "MALAYSIA",
            "value" => "MALAYSIA",
          ),
          array(
            "label" => "SINGAPORE",
            "value" => "SINGAPORE",
          ),
          array(
            "label" => "TAIWAN",
            "value" => "TAIWAN",
          ),
          array(
            "label" => "THAILAND",
            "value" => "THAILAND",
          ),
          array(
            "label" => "CANADA",
            "value" => "CANADA",
          ),
          array(
            "label" => "USA",
            "value" => "USA",
          ),
          array(
            "label" => "MALDIVES",
            "value" => "MALDIVES",
          ),
          array(
            "label" => "RUSSIA",
            "value" => "RUSSIA",
          ),
          array(
            "label" => "EGYPT",
            "value" => "EGYPT",
          ),
          array(
            "label" => "ALGERIA",
            "value" => "ALGERIA",
          ),
          array(
            "label" => "MAURITIUS",
            "value" => "MAURITIUS",
          ),
          array(
            "label" => "ZIMBABWE",
            "value" => "ZIMBABWE",
          ),
          array(
            "label" => "SOUTH AFRICA",
            "value" => "SOUTH AFRICA",
          ),
          array(
            "label" => "NETHERLANDS",
            "value" => "NETHERLANDS",
          ),
          array(
            "label" => "BELGIUM",
            "value" => "BELGIUM",
          ),
          array(
            "label" => "FRANCE",
            "value" => "FRANCE",
          ),
          array(
            "label" => "SPAIN",
            "value" => "SPAIN",
          ),
          array(
            "label" => "MALTA",
            "value" => "MALTA",
          ),
          array(
            "label" => "HUNGARY",
            "value" => "HUNGARY",
          ),
          array(
            "label" => "ITALY",
            "value" => "ITALY",
          ),
          array(
            "label" => "ROMANIA",
            "value" => "ROMANIA",
          ),
          array(
            "label" => "SWITZERLAND",
            "value" => "SWITZERLAND",
          ),
          array(
            "label" => "AUSTRIA",
            "value" => "AUSTRIA",
          ),
          array(
            "label" => "UNITED KINGDOM",
            "value" => "UNITED KINGDOM",
          ),
          array(
            "label" => "DENMARK",
            "value" => "DENMARK",
          ),
          array(
            "label" => "SWEDEN",
            "value" => "SWEDEN",
          ),
          array(
            "label" => "NORWAY",
            "value" => "NORWAY",
          ),
          array(
            "label" => "POLAND",
            "value" => "POLAND",
          ),
          array(
            "label" => "GERMANY",
            "value" => "GERMANY",
          ),
          array(
            "label" => "HONDURAS",
            "value" => "HONDURAS",
          ),
          array(
            "label" => "PORTUGAL",
            "value" => "PORTUGAL",
          ),
          array(
            "label" => "MEXICO",
            "value" => "MEXICO",
          ),
          array(
            "label" => "MACAU SPECIAL ADMINISTRATIVE REGION",
            "value" => "MACAU SPECIAL ADMINISTRATIVE REGION",
          ),
          array(
            "label" => "ARGENTINA",
            "value" => "ARGENTINA",
          ),
          array(
            "label" => "BRAZIL",
            "value" => "BRAZIL",
          ),
          array(
            "label" => "CHILE",
            "value" => "CHILE",
          ),
          array(
            "label" => "FINLAND",
            "value" => "FINLAND",
          ),
          array(
            "label" => "AUSTRALIA",
            "value" => "AUSTRALIA",
          ),
          array(
            "label" => "PHILIPPINES",
            "value" => "PHILIPPINES",
          ),
          array(
            "label" => "NEW ZEALAND",
            "value" => "NEW ZEALAND",
          ),
          array(
            "label" => "THAILAND",
            "value" => "THAILAND",
          ),
          array(
            "label" => "BRUNEI",
            "value" => "BRUNEI",
          ),
          array(
            "label" => "IRELAND",
            "value" => "IRELAND",
          ),
          array(
            "label" => "PAPUA N. GUINEA",
            "value" => "PAPUA N. GUINEA",
          ),
          array(
            "label" => "PUERTO RICO",
            "value" => "PUERTO RICO",
          ),
          array(
            "label" => "KOREA",
            "value" => "KOREA",
          ),
          array(
            "label" => "JAPAN",
            "value" => "JAPAN",
          ),
          array(
            "label" => "VIETNAM",
            "value" => "VIETNAM",
          ),
          array(
            "label" => "BANGLADESH",
            "value" => "BANGLADESH",
          ),
          array(
            "label" => "NAURU",
            "value" => "NAURU",
          ),
          array(
            "label" => "INDIA",
            "value" => "INDIA",
          ),
          array(
            "label" => "PAKISTAN",
            "value" => "PAKISTAN",
          ),
          array(
            "label" => "SRI LANKA",
            "value" => "SRI LANKA",
          ),
          array(
            "label" => "MYANMAR",
            "value" => "MYANMAR",
          ),
          array(
            "label" => "SAUDI ARABIA AND KUWAIT",
            "value" => "SAUDI ARABIA AND KUWAIT",
          ),
          array(
            "label" => "UAE",
            "value" => "UAE",
          ),
          array(
            "label" => "IRAN",
            "value" => "IRAN",
          ),
          array(
            "label" => "CAMBODIA",
            "value" => "CAMBODIA",
          ),
        ),
      ),

      "address_state_data" => array(
        "name" => "State / Province*",
        "placeholder" => "",
      ),

      "address_city_data" => array(
        "name" => "City*",
        "placeholder" => "",
      ),

      "address_postal_code_data" => array(
        "name" => "Post code*",
        "placeholder" => "",
      ),

      "preferred_language_data" => array(
        "name" => "Preferred language",
        "placeholder" => "Select one",
        "options" => array(
          array(
            "label" => "ENGLISH",
            "value" => "EN",
          ),
          array(
            "label" => "繁體中文",
            "value" => "ZT",
          ),
          array(
            "label" => "简体中文",
            "value" => "ZH",
          ),
        ),
      ),

      "pin_data" => array(
        "name" => "Pin",
        "placeholder" => "",
      ),

      "pin_confirm_data" => array(
        "name" => "Confirm Pin",
        "placeholder" => "",
      ),

      "head_of_state_data" => array(
        "name" => "Head of state, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
        "placeholder" => "",
      ),

      "subscribe_to_gra_data" => array(
        "name" => "Subscribe to Genting Rewards Alliance updates, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
        "placeholder" => "",
      ),

      "privacy_policy_data" => array(
        "name" => "Privacy policy, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
        "placeholder" => "",
      ),

      "promo_permission_data" => array(
        "name" => "Promo permission, Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.",
        "placeholder" => "",
      ),
      
      
    );
  

    $output_json = json_encode($output_data);

    return $output_json;
  }




  public function get_registration_content_chinese_simplified()
  {
    $output_data = array(
    );
  

    $output_json = json_encode($output_data);

    return $output_json;
  }
  public function get_registration_content_chinese_traditional()
  {
    $output_data = array(
    );
  

    $output_json = json_encode($output_data);

    return $output_json;
  }


}
