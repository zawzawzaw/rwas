<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
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

  
  
  //    _____ ____ ___ _____
  //   | ____|  _ \_ _|_   _|
  //   |  _| | | | | |  | |
  //   | |___| |_| | |  | |
  //   |_____|____/___| |_|
  //  

  public function get_edit_content()
  {
    $output_data = array(
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

      "mobile_data" => array(
        "name" => "Mobile*",
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
            "label" => "CHINA",
            "value" => "CHINA",
          ),
          array(
            "label" => "HONG KONG",
            "value" => "HONG KONG",
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
            "value" => "MACAU",
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

  
  

  //    ____  _____ ____ ___ ____ _____ ____      _  _____ ___ ___  _   _
  //   |  _ \| ____/ ___|_ _/ ___|_   _|  _ \    / \|_   _|_ _/ _ \| \ | |
  //   | |_) |  _|| |  _ | |\___ \ | | | |_) |  / _ \ | |  | | | | |  \| |
  //   |  _ <| |__| |_| || | ___) || | |  _ <  / ___ \| |  | | |_| | |\  |
  //   |_| \_\_____\____|___|____/ |_| |_| \_\/_/   \_\_| |___\___/|_| \_|
  //


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
            "label" => "CHINA",
            "value" => "CHINA",
          ),
          array(
            "label" => "HONG KONG",
            "value" => "HONG KONG",
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
            "value" => "MACAU",
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
            "label" => "CHINA",
            "value" => "CHINA",
          ),
          array(
            "label" => "HONG KONG",
            "value" => "HONG KONG",
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
            "value" => "MACAU",
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
            "label" => "CHINA (86)",
            "value" => "86",
          ),
          array(
            "label" => "HONG KONG (852)",
            "value" => "852",
          ),
          array(
            "label" => "INDONESIA (62)",
            "value" => "62",
          ),
          array(
            "label" => "MALAYSIA (60)",
            "value" => "60",
          ),
          array(
            "label" => "SINGAPORE (65)",
            "value" => "65",
          ),
          array(
            "label" => "TAIWAN (886)",
            "value" => "886",
          ),
          array(
            "label" => "THAILAND (66)",
            "value" => "66",
          ),
          array(
            "label" => "CANADA (00)",
            "value" => "00",
          ),
          array(
            "label" => "USA (01)",
            "value" => "01",
          ),
          array(
            "label" => "MALDIVES (06)",
            "value" => "06",
          ),
          array(
            "label" => "RUSSIA (07)",
            "value" => "07",
          ),
          array(
            "label" => "EGYPT (20)",
            "value" => "20",
          ),
          array(
            "label" => "ALGERIA (21)",
            "value" => "21",
          ),
          array(
            "label" => "MAURITIUS (23)",
            "value" => "23",
          ),
          array(
            "label" => "ZIMBABWE (26)",
            "value" => "26",
          ),
          array(
            "label" => "SOUTH AFRICA (27)",
            "value" => "27",
          ),
          array(
            "label" => "NETHERLANDS (31)",
            "value" => "31",
          ),
          array(
            "label" => "BELGIUM (32)",
            "value" => "32",
          ),
          array(
            "label" => "FRANCE (33)",
            "value" => "33",
          ),
          array(
            "label" => "SPAIN (34)",
            "value" => "34",
          ),
          array(
            "label" => "MALTA (35)",
            "value" => "35",
          ),
          array(
            "label" => "HUNGARY (36)",
            "value" => "36",
          ),
          array(
            "label" => "ITALY (39)",
            "value" => "39",
          ),
          array(
            "label" => "ROMANIA (40)",
            "value" => "40",
          ),
          array(
            "label" => "SWITZERLAND (41)",
            "value" => "41",
          ),
          array(
            "label" => "AUSTRIA (43)",
            "value" => "43",
          ),
          array(
            "label" => "UNITED KINGDOM (44)",
            "value" => "44",
          ),
          array(
            "label" => "DENMARK (45)",
            "value" => "45",
          ),
          array(
            "label" => "SWEDEN (46)",
            "value" => "46",
          ),
          array(
            "label" => "NORWAY (47)",
            "value" => "47",
          ),
          array(
            "label" => "POLAND (48)",
            "value" => "48",
          ),
          array(
            "label" => "GERMANY (49)",
            "value" => "49",
          ),
          array(
            "label" => "HONDURAS (50)",
            "value" => "50",
          ),
          array(
            "label" => "PORTUGAL (51)",
            "value" => "51",
          ),
          array(
            "label" => "MEXICO (52)",
            "value" => "52",
          ),
          array(
            "label" => "MACAU SPECIAL ADMINISTRATIVE REGION (53)",
            "value" => "53",
          ),
          array(
            "label" => "ARGENTINA (54)",
            "value" => "54",
          ),
          array(
            "label" => "BRAZIL (55)",
            "value" => "55",
          ),
          array(
            "label" => "CHILE (56)",
            "value" => "56",
          ),
          array(
            "label" => "FINLAND (58)",
            "value" => "58",
          ),
          array(
            "label" => "AUSTRALIA (61)",
            "value" => "61",
          ),
          array(
            "label" => "PHILIPPINES (63)",
            "value" => "63",
          ),
          array(
            "label" => "NEW ZEALAND (64)",
            "value" => "64",
          ),
          array(
            "label" => "THAILAND (66)",
            "value" => "66",
          ),
          array(
            "label" => "BRUNEI (67)",
            "value" => "67",
          ),
          array(
            "label" => "IRELAND (72)",
            "value" => "72",
          ),
          array(
            "label" => "PAPUA N. GUINEA (75)",
            "value" => "75",
          ),
          array(
            "label" => "PUERTO RICO (78)",
            "value" => "78",
          ),
          array(
            "label" => "KOREA (80)",
            "value" => "80",
          ),
          array(
            "label" => "JAPAN (81)",
            "value" => "81",
          ),
          array(
            "label" => "VIETNAM (84)",
            "value" => "84",
          ),
          array(
            "label" => "BANGLADESH (89)",
            "value" => "89",
          ),
          array(
            "label" => "NAURU (90)",
            "value" => "90",
          ),
          array(
            "label" => "INDIA (91)",
            "value" => "91",
          ),
          array(
            "label" => "PAKISTAN (92)",
            "value" => "92",
          ),
          array(
            "label" => "SRI LANKA (94)",
            "value" => "94",
          ),
          array(
            "label" => "MYANMAR (95)",
            "value" => "95",
          ),
          array(
            "label" => "SAUDI ARABIA AND KUWAIT (96)",
            "value" => "96",
          ),
          array(
            "label" => "UAE (97)",
            "value" => "97",
          ),
          array(
            "label" => "IRAN (98)",
            "value" => "98",
          ),
          array(
            "label" => "CAMBODIA (855)",
            "value" => "855",
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
            "label" => "CHINA",
            "value" => "CHINA",
          ),
          array(
            "label" => "HONG KONG",
            "value" => "HONG KONG",
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
            "value" => "MACAU",
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


  //    ____ ___ __  __ ____  _     ___ _____ ___ _____ ____
  //   / ___|_ _|  \/  |  _ \| |   |_ _|  ___|_ _| ____|  _ \
  //   \___ \| || |\/| | |_) | |    | || |_   | ||  _| | | | |
  //    ___) | || |  | |  __/| |___ | ||  _|  | || |___| |_| |
  //   |____/___|_|  |_|_|   |_____|___|_|   |___|_____|____/
  //

  public function get_registration_content_chinese_simplified()
  {
    $output_data = array(

      "title_data" => array(
        "name" => "称谓*",
        "placeholder" => "Select one",
        "options" => array(
          array(
            "label" => "先生",
            "value" => "MR",
          ),
          array(
            "label" => "女士",
            "value" => "MS",
          ),
          array(
            "label" => "太太",
            "value" => "MDM",
          ),
        ),
      ),

      "first_name_data" => array(
        "name" => "名字*",
        "placeholder" => "",
      ),

      "last_name_data" => array(
        "name" => "姓氏*",
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
        "name" => "出生日期*",
        "placeholder" => "DD/MM/YYYY",
      ),

      "nationality_data" => array(
        "name" => "国籍*",
        "placeholder" => "Select one",
        "options" => array(
          array(
            "label" => "中国内地",
            "value" => "CHINA",
          ),
          array(
            "label" => "香港特别行政区",
            "value" => "HONG KONG",
          ),
          array(
            "label" => "印度尼西亚",
            "value" => "INDONESIA",
          ),
          array(
            "label" => "马来西亚",
            "value" => "MALAYSIA",
          ),
          array(
            "label" => "新加坡",
            "value" => "SINGAPORE",
          ),
          array(
            "label" => "台湾",
            "value" => "TAIWAN",
          ),
          array(
            "label" => "泰国",
            "value" => "THAILAND",
          ),
          array(
            "label" => "加拿大",
            "value" => "CANADA",
          ),
          array(
            "label" => "美国",
            "value" => "USA",
          ),
          array(
            "label" => "马尔代夫",
            "value" => "MALDIVES",
          ),
          array(
            "label" => "俄国",
            "value" => "RUSSIA",
          ),
          array(
            "label" => "埃及",
            "value" => "EGYPT",
          ),
          array(
            "label" => "阿尔及利亚",
            "value" => "ALGERIA",
          ),
          array(
            "label" => "毛里求斯",
            "value" => "MAURITIUS",
          ),
          array(
            "label" => "津巴布韦",
            "value" => "ZIMBABWE",
          ),
          array(
            "label" => "南非",
            "value" => "SOUTH AFRICA",
          ),
          array(
            "label" => "荷兰",
            "value" => "NETHERLANDS",
          ),
          array(
            "label" => "比利时",
            "value" => "BELGIUM",
          ),
          array(
            "label" => "法国",
            "value" => "FRANCE",
          ),
          array(
            "label" => "西班牙",
            "value" => "SPAIN",
          ),
          array(
            "label" => "马耳他",
            "value" => "MALTA",
          ),
          array(
            "label" => "匈牙利",
            "value" => "HUNGARY",
          ),
          array(
            "label" => "意大利",
            "value" => "ITALY",
          ),
          array(
            "label" => "罗马尼亚",
            "value" => "ROMANIA",
          ),
          array(
            "label" => "瑞士",
            "value" => "SWITZERLAND",
          ),
          array(
            "label" => "奥地利",
            "value" => "AUSTRIA",
          ),
          array(
            "label" => "英国",
            "value" => "UNITED KINGDOM",
          ),
          array(
            "label" => "丹麦",
            "value" => "DENMARK",
          ),
          array(
            "label" => "瑞典",
            "value" => "SWEDEN",
          ),
          array(
            "label" => "挪威",
            "value" => "NORWAY",
          ),
          array(
            "label" => "波兰",
            "value" => "POLAND",
          ),
          array(
            "label" => "德国",
            "value" => "GERMANY",
          ),
          array(
            "label" => "洪都拉斯",
            "value" => "HONDURAS",
          ),
          array(
            "label" => "葡萄牙",
            "value" => "PORTUGAL",
          ),
          array(
            "label" => "墨西哥",
            "value" => "MEXICO",
          ),
          array(
            "label" => "澳门特别行政区",
            "value" => "MACAU",
          ),
          array(
            "label" => "阿根廷",
            "value" => "ARGENTINA",
          ),
          array(
            "label" => "巴西",
            "value" => "BRAZIL",
          ),
          array(
            "label" => "智利",
            "value" => "CHILE",
          ),
          array(
            "label" => "芬兰",
            "value" => "FINLAND",
          ),
          array(
            "label" => "澳大利亚",
            "value" => "AUSTRALIA",
          ),
          array(
            "label" => "菲律宾",
            "value" => "PHILIPPINES",
          ),
          array(
            "label" => "新西兰",
            "value" => "NEW ZEALAND",
          ),
          array(
            "label" => "泰国",
            "value" => "THAILAND",
          ),
          array(
            "label" => "汶莱",
            "value" => "BRUNEI",
          ),
          array(
            "label" => "爱尔兰",
            "value" => "IRELAND",
          ),
          array(
            "label" => "巴布亚新几内亚",
            "value" => "PAPUA N. GUINEA",
          ),
          array(
            "label" => "波多黎各",
            "value" => "PUERTO RICO",
          ),
          array(
            "label" => "韩国",
            "value" => "KOREA",
          ),
          array(
            "label" => "日本",
            "value" => "JAPAN",
          ),
          array(
            "label" => "越南",
            "value" => "VIETNAM",
          ),
          array(
            "label" => "孟加拉国",
            "value" => "BANGLADESH",
          ),
          array(
            "label" => "诺鲁",
            "value" => "NAURU",
          ),
          array(
            "label" => "印度",
            "value" => "INDIA",
          ),
          array(
            "label" => "巴基斯坦",
            "value" => "PAKISTAN",
          ),
          array(
            "label" => "斯里兰卡",
            "value" => "SRI LANKA",
          ),
          array(
            "label" => "缅甸",
            "value" => "MYANMAR",
          ),
          array(
            "label" => "沙特阿拉伯和科威特",
            "value" => "SAUDI ARABIA AND KUWAIT",
          ),
          array(
            "label" => "阿联酋",
            "value" => "UAE",
          ),
          array(
            "label" => "伊朗",
            "value" => "IRAN",
          ),
          array(
            "label" => "柬埔寨",
            "value" => "CAMBODIA",
          ),
        ),
      ),

      "doc_type_data" => array(
        "name" => "证件类别",
        "placeholder" => "Select one",
        "options" => array(
          array(
            "label" => "身分证",
            "value" => "IC",
          ),
          array(
            "label" => "护照",
            "value" => "PP",
          ),
        ),
      ),
      
      "doc_no_data" => array(
        "name" => "护照／身份证号码",
        "placeholder" => "",
      ),

      "doc_country_data" => array(
        "name" => "旅游证件(发证国家 / 地区)",
        "placeholder" => "Select one",
        "options" => array(
          array(
            "label" => "中国内地",
            "value" => "CHINA",
          ),
          array(
            "label" => "香港特别行政区",
            "value" => "HONG KONG",
          ),
          array(
            "label" => "印度尼西亚",
            "value" => "INDONESIA",
          ),
          array(
            "label" => "马来西亚",
            "value" => "MALAYSIA",
          ),
          array(
            "label" => "新加坡",
            "value" => "SINGAPORE",
          ),
          array(
            "label" => "台湾",
            "value" => "TAIWAN",
          ),
          array(
            "label" => "泰国",
            "value" => "THAILAND",
          ),
          array(
            "label" => "加拿大",
            "value" => "CANADA",
          ),
          array(
            "label" => "美国",
            "value" => "USA",
          ),
          array(
            "label" => "马尔代夫",
            "value" => "MALDIVES",
          ),
          array(
            "label" => "俄国",
            "value" => "RUSSIA",
          ),
          array(
            "label" => "埃及",
            "value" => "EGYPT",
          ),
          array(
            "label" => "阿尔及利亚",
            "value" => "ALGERIA",
          ),
          array(
            "label" => "毛里求斯",
            "value" => "MAURITIUS",
          ),
          array(
            "label" => "津巴布韦",
            "value" => "ZIMBABWE",
          ),
          array(
            "label" => "南非",
            "value" => "SOUTH AFRICA",
          ),
          array(
            "label" => "荷兰",
            "value" => "NETHERLANDS",
          ),
          array(
            "label" => "比利时",
            "value" => "BELGIUM",
          ),
          array(
            "label" => "法国",
            "value" => "FRANCE",
          ),
          array(
            "label" => "西班牙",
            "value" => "SPAIN",
          ),
          array(
            "label" => "马耳他",
            "value" => "MALTA",
          ),
          array(
            "label" => "匈牙利",
            "value" => "HUNGARY",
          ),
          array(
            "label" => "意大利",
            "value" => "ITALY",
          ),
          array(
            "label" => "罗马尼亚",
            "value" => "ROMANIA",
          ),
          array(
            "label" => "瑞士",
            "value" => "SWITZERLAND",
          ),
          array(
            "label" => "奥地利",
            "value" => "AUSTRIA",
          ),
          array(
            "label" => "英国",
            "value" => "UNITED KINGDOM",
          ),
          array(
            "label" => "丹麦",
            "value" => "DENMARK",
          ),
          array(
            "label" => "瑞典",
            "value" => "SWEDEN",
          ),
          array(
            "label" => "挪威",
            "value" => "NORWAY",
          ),
          array(
            "label" => "波兰",
            "value" => "POLAND",
          ),
          array(
            "label" => "德国",
            "value" => "GERMANY",
          ),
          array(
            "label" => "洪都拉斯",
            "value" => "HONDURAS",
          ),
          array(
            "label" => "葡萄牙",
            "value" => "PORTUGAL",
          ),
          array(
            "label" => "墨西哥",
            "value" => "MEXICO",
          ),
          array(
            "label" => "澳门特别行政区",
            "value" => "MACAU",
          ),
          array(
            "label" => "阿根廷",
            "value" => "ARGENTINA",
          ),
          array(
            "label" => "巴西",
            "value" => "BRAZIL",
          ),
          array(
            "label" => "智利",
            "value" => "CHILE",
          ),
          array(
            "label" => "芬兰",
            "value" => "FINLAND",
          ),
          array(
            "label" => "澳大利亚",
            "value" => "AUSTRALIA",
          ),
          array(
            "label" => "菲律宾",
            "value" => "PHILIPPINES",
          ),
          array(
            "label" => "新西兰",
            "value" => "NEW ZEALAND",
          ),
          array(
            "label" => "泰国",
            "value" => "THAILAND",
          ),
          array(
            "label" => "汶莱",
            "value" => "BRUNEI",
          ),
          array(
            "label" => "爱尔兰",
            "value" => "IRELAND",
          ),
          array(
            "label" => "巴布亚新几内亚",
            "value" => "PAPUA N. GUINEA",
          ),
          array(
            "label" => "波多黎各",
            "value" => "PUERTO RICO",
          ),
          array(
            "label" => "韩国",
            "value" => "KOREA",
          ),
          array(
            "label" => "日本",
            "value" => "JAPAN",
          ),
          array(
            "label" => "越南",
            "value" => "VIETNAM",
          ),
          array(
            "label" => "孟加拉国",
            "value" => "BANGLADESH",
          ),
          array(
            "label" => "诺鲁",
            "value" => "NAURU",
          ),
          array(
            "label" => "印度",
            "value" => "INDIA",
          ),
          array(
            "label" => "巴基斯坦",
            "value" => "PAKISTAN",
          ),
          array(
            "label" => "斯里兰卡",
            "value" => "SRI LANKA",
          ),
          array(
            "label" => "缅甸",
            "value" => "MYANMAR",
          ),
          array(
            "label" => "沙特阿拉伯和科威特",
            "value" => "SAUDI ARABIA AND KUWAIT",
          ),
          array(
            "label" => "阿联酋",
            "value" => "UAE",
          ),
          array(
            "label" => "伊朗",
            "value" => "IRAN",
          ),
          array(
            "label" => "柬埔寨",
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
            "label" => "公司持有人/合伙人",
            "value" => "Business owner/Partner",
          ),
          array(
            "label" => "办公室员工",
            "value" => "Other office worker",
          ),
          array(
            "label" => "专业/技术人员",
            "value" => "Professional / Technical",
          ),
          array(
            "label" => "退休，非在职人士，家庭主妇及/或学生",
            "value" => "Retired,unemployed,housewife,student",
          ),
          array(
            "label" => "高级/行政管理人",
            "value" => "Senior/Executive management",
          ),
          array(
            "label" => "其他",
            "value" => "Others",
          ),
          

        ),
      ),

      "nature_of_business_data" => array(
        "name" => "Nature of business",
        "placeholder" => "Select one",
        "options" => array(
          array(
            "label" => "农业、矿业、林业",
            "value" => "Agriculture, Mining & Forestry",
          ),
          array(
            "label" => "建筑业/物流业/通讯业/公共建设",
            "value" => "Construction/Transpo/Comm/Utililities",
          ),
          array(
            "label" => "金融服务- 银行、保险、资产管理",
            "value" => "Financial Services - Banking, Insurance",
          ),
          array(
            "label" => "金融服务- 其他",
            "value" => "Financial Services - Other",
          ),
          array(
            "label" => "一般业务/自雇",
            "value" => "General Business/Self Employed",
          ),
          array(
            "label" => "政府/公营部门",
            "value" => "Government/Public Sector",
          ),
          array(
            "label" => "酒店&旅游(如酒店，旅游中介)",
            "value" => "Hospitality & Tourism",
          ),
          array(
            "label" => "非牟利/慈善机构",
            "value" => "Non-Profit/Charity Organization",
          ),
          array(
            "label" => "其他/无",
            "value" => "Others/None",
          ),
          array(
            "label" => "专业服务：法律、会计或咨询",
            "value" => "Professional Services:Law,Accounting",
          ),
          array(
            "label" => "专业服务：其他",
            "value" => "Professional Services:Others",
          ),
          array(
            "label" => "房地产",
            "value" => "Real Estate",
          ),
          array(
            "label" => "制造业：防御品",
            "value" => "Manufacturing:Defense Goods",
          ),
          array(
            "label" => "贸易：防御品",
            "value" => "Trading Business:Defense Goods",
          ),
          array(
            "label" => "贸易：进/出口",
            "value" => "Trading Business:Import/Export",
          ),
          array(
            "label" => "制造业：珠宝及/或贵金属",
            "value" => "Manufacturing:Jewelry/Precious Metals",
          ),
          array(
            "label" => "贸易: 珠宝及/或贵金属",
            "value" => "Trading Business:Jewelry/Precious Metals",
          ),
          array(
            "label" => "贸易：其他",
            "value" => "Trading Business:Others",
          ),
          array(
            "label" => "制造业：其他",
            "value" => "Manufacturing:Others",
          ),
        ),
      ),

      "email_data" => array(
        "name" => "电邮地址*",
        "placeholder" => "",
      ),

      "mobile_country_data" => array(
        "name" => "手提电话号码*",
        "placeholder" => "Select one",
        "options" => array(
          array(
            "label" => "中国内地 (86)",
            "value" => "86",
          ),
          array(
            "label" => "香港特别行政区 (852)",
            "value" => "852",
          ),
          array(
            "label" => "印度尼西亚 (62)",
            "value" => "62",
          ),
          array(
            "label" => "马来西亚 (60)",
            "value" => "60",
          ),
          array(
            "label" => "新加坡 (65)",
            "value" => "65",
          ),
          array(
            "label" => "台湾 (886)",
            "value" => "886",
          ),
          array(
            "label" => "泰国 (66)",
            "value" => "66",
          ),
          array(
            "label" => "加拿大 (00)",
            "value" => "00",
          ),
          array(
            "label" => "美国 (01)",
            "value" => "01",
          ),
          array(
            "label" => "马尔代夫 (06)",
            "value" => "06",
          ),
          array(
            "label" => "俄国 (07)",
            "value" => "07",
          ),
          array(
            "label" => "埃及 (20)",
            "value" => "20",
          ),
          array(
            "label" => "阿尔及利亚 (21)",
            "value" => "21",
          ),
          array(
            "label" => "毛里求斯 (23)",
            "value" => "23",
          ),
          array(
            "label" => "津巴布韦 (26)",
            "value" => "26",
          ),
          array(
            "label" => "南非 (27)",
            "value" => "27",
          ),
          array(
            "label" => "荷兰 (31)",
            "value" => "31",
          ),
          array(
            "label" => "比利时 (32)",
            "value" => "32",
          ),
          array(
            "label" => "法国 (33)",
            "value" => "33",
          ),
          array(
            "label" => "西班牙 (34)",
            "value" => "34",
          ),
          array(
            "label" => "马耳他 (35)",
            "value" => "35",
          ),
          array(
            "label" => "匈牙利 (36)",
            "value" => "36",
          ),
          array(
            "label" => "意大利 (39)",
            "value" => "39",
          ),
          array(
            "label" => "罗马尼亚 (40)",
            "value" => "40",
          ),
          array(
            "label" => "瑞士 (41)",
            "value" => "41",
          ),
          array(
            "label" => "奥地利 (43)",
            "value" => "43",
          ),
          array(
            "label" => "英国 (44)",
            "value" => "44",
          ),
          array(
            "label" => "丹麦 (45)",
            "value" => "45",
          ),
          array(
            "label" => "瑞典 (46)",
            "value" => "46",
          ),
          array(
            "label" => "挪威 (47)",
            "value" => "47",
          ),
          array(
            "label" => "波兰 (48)",
            "value" => "48",
          ),
          array(
            "label" => "德国 (49)",
            "value" => "49",
          ),
          array(
            "label" => "洪都拉斯 (50)",
            "value" => "50",
          ),
          array(
            "label" => "葡萄牙 (51)",
            "value" => "51",
          ),
          array(
            "label" => "墨西哥 (52)",
            "value" => "52",
          ),
          array(
            "label" => "澳门特别行政区 (53)",
            "value" => "53",
          ),
          array(
            "label" => "阿根廷 (54)",
            "value" => "54",
          ),
          array(
            "label" => "巴西 (55)",
            "value" => "55",
          ),
          array(
            "label" => "智利 (56)",
            "value" => "56",
          ),
          array(
            "label" => "芬兰 (58)",
            "value" => "58",
          ),
          array(
            "label" => "澳大利亚 (61)",
            "value" => "61",
          ),
          array(
            "label" => "菲律宾 (63)",
            "value" => "63",
          ),
          array(
            "label" => "新西兰 (64)",
            "value" => "64",
          ),
          array(
            "label" => "泰国 (66)",
            "value" => "66",
          ),
          array(
            "label" => "汶莱 (67)",
            "value" => "67",
          ),
          array(
            "label" => "爱尔兰 (72)",
            "value" => "72",
          ),
          array(
            "label" => "巴布亚新几内亚 (75)",
            "value" => "75",
          ),
          array(
            "label" => "波多黎各 (78)",
            "value" => "78",
          ),
          array(
            "label" => "韩国 (80)",
            "value" => "80",
          ),
          array(
            "label" => "日本 (81)",
            "value" => "81",
          ),
          array(
            "label" => "越南 (84)",
            "value" => "84",
          ),
          array(
            "label" => "孟加拉国 (89)",
            "value" => "89",
          ),
          array(
            "label" => "诺鲁 (90)",
            "value" => "90",
          ),
          array(
            "label" => "印度 (91)",
            "value" => "91",
          ),
          array(
            "label" => "巴基斯坦 (92)",
            "value" => "92",
          ),
          array(
            "label" => "斯里兰卡 (94)",
            "value" => "94",
          ),
          array(
            "label" => "缅甸 (95)",
            "value" => "95",
          ),
          array(
            "label" => "沙特阿拉伯和科威特 (96)",
            "value" => "96",
          ),
          array(
            "label" => "阿联酋 (97)",
            "value" => "97",
          ),
          array(
            "label" => "伊朗 (98)",
            "value" => "98",
          ),
          array(
            "label" => "柬埔寨 (855)",
            "value" => "855",
          ),
        ),
      ),

      "mobile_number_data" => array(
        "name" => "",
        "placeholder" => "",
      ),

      "address_line_01_data" => array(
        "name" => "邮寄地址*",
        "placeholder" => "",
      ),

      "address_country_data" => array(
        "name" => "国家",
        "placeholder" => "Select one",
        "options" => array(
          array(
            "label" => "中国内地",
            "value" => "CHINA",
          ),
          array(
            "label" => "香港特别行政区",
            "value" => "HONG KONG",
          ),
          array(
            "label" => "印度尼西亚",
            "value" => "INDONESIA",
          ),
          array(
            "label" => "马来西亚",
            "value" => "MALAYSIA",
          ),
          array(
            "label" => "新加坡",
            "value" => "SINGAPORE",
          ),
          array(
            "label" => "台湾",
            "value" => "TAIWAN",
          ),
          array(
            "label" => "泰国",
            "value" => "THAILAND",
          ),
          array(
            "label" => "加拿大",
            "value" => "CANADA",
          ),
          array(
            "label" => "美国",
            "value" => "USA",
          ),
          array(
            "label" => "马尔代夫",
            "value" => "MALDIVES",
          ),
          array(
            "label" => "俄国",
            "value" => "RUSSIA",
          ),
          array(
            "label" => "埃及",
            "value" => "EGYPT",
          ),
          array(
            "label" => "阿尔及利亚",
            "value" => "ALGERIA",
          ),
          array(
            "label" => "毛里求斯",
            "value" => "MAURITIUS",
          ),
          array(
            "label" => "津巴布韦",
            "value" => "ZIMBABWE",
          ),
          array(
            "label" => "南非",
            "value" => "SOUTH AFRICA",
          ),
          array(
            "label" => "荷兰",
            "value" => "NETHERLANDS",
          ),
          array(
            "label" => "比利时",
            "value" => "BELGIUM",
          ),
          array(
            "label" => "法国",
            "value" => "FRANCE",
          ),
          array(
            "label" => "西班牙",
            "value" => "SPAIN",
          ),
          array(
            "label" => "马耳他",
            "value" => "MALTA",
          ),
          array(
            "label" => "匈牙利",
            "value" => "HUNGARY",
          ),
          array(
            "label" => "意大利",
            "value" => "ITALY",
          ),
          array(
            "label" => "罗马尼亚",
            "value" => "ROMANIA",
          ),
          array(
            "label" => "瑞士",
            "value" => "SWITZERLAND",
          ),
          array(
            "label" => "奥地利",
            "value" => "AUSTRIA",
          ),
          array(
            "label" => "英国",
            "value" => "UNITED KINGDOM",
          ),
          array(
            "label" => "丹麦",
            "value" => "DENMARK",
          ),
          array(
            "label" => "瑞典",
            "value" => "SWEDEN",
          ),
          array(
            "label" => "挪威",
            "value" => "NORWAY",
          ),
          array(
            "label" => "波兰",
            "value" => "POLAND",
          ),
          array(
            "label" => "德国",
            "value" => "GERMANY",
          ),
          array(
            "label" => "洪都拉斯",
            "value" => "HONDURAS",
          ),
          array(
            "label" => "葡萄牙",
            "value" => "PORTUGAL",
          ),
          array(
            "label" => "墨西哥",
            "value" => "MEXICO",
          ),
          array(
            "label" => "澳门特别行政区",
            "value" => "MACAU",
          ),
          array(
            "label" => "阿根廷",
            "value" => "ARGENTINA",
          ),
          array(
            "label" => "巴西",
            "value" => "BRAZIL",
          ),
          array(
            "label" => "智利",
            "value" => "CHILE",
          ),
          array(
            "label" => "芬兰",
            "value" => "FINLAND",
          ),
          array(
            "label" => "澳大利亚",
            "value" => "AUSTRALIA",
          ),
          array(
            "label" => "菲律宾",
            "value" => "PHILIPPINES",
          ),
          array(
            "label" => "新西兰",
            "value" => "NEW ZEALAND",
          ),
          array(
            "label" => "泰国",
            "value" => "THAILAND",
          ),
          array(
            "label" => "汶莱",
            "value" => "BRUNEI",
          ),
          array(
            "label" => "爱尔兰",
            "value" => "IRELAND",
          ),
          array(
            "label" => "巴布亚新几内亚",
            "value" => "PAPUA N. GUINEA",
          ),
          array(
            "label" => "波多黎各",
            "value" => "PUERTO RICO",
          ),
          array(
            "label" => "韩国",
            "value" => "KOREA",
          ),
          array(
            "label" => "日本",
            "value" => "JAPAN",
          ),
          array(
            "label" => "越南",
            "value" => "VIETNAM",
          ),
          array(
            "label" => "孟加拉国",
            "value" => "BANGLADESH",
          ),
          array(
            "label" => "诺鲁",
            "value" => "NAURU",
          ),
          array(
            "label" => "印度",
            "value" => "INDIA",
          ),
          array(
            "label" => "巴基斯坦",
            "value" => "PAKISTAN",
          ),
          array(
            "label" => "斯里兰卡",
            "value" => "SRI LANKA",
          ),
          array(
            "label" => "缅甸",
            "value" => "MYANMAR",
          ),
          array(
            "label" => "沙特阿拉伯和科威特",
            "value" => "SAUDI ARABIA AND KUWAIT",
          ),
          array(
            "label" => "阿联酋",
            "value" => "UAE",
          ),
          array(
            "label" => "伊朗",
            "value" => "IRAN",
          ),
          array(
            "label" => "柬埔寨",
            "value" => "CAMBODIA",
          ),
        ),
      ),

      "address_state_data" => array(
        "name" => "州/省*",
        "placeholder" => "",
      ),

      "address_city_data" => array(
        "name" => "市*",
        "placeholder" => "",
      ),

      "address_postal_code_data" => array(
        "name" => "邮政编码*",
        "placeholder" => "",
      ),

      "preferred_language_data" => array(
        "name" => "通讯语言",
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
        "name" => "PIN码",
        "placeholder" => "",
      ),

      "pin_confirm_data" => array(
        "name" => "确定PIN码",
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

  //    _____ ____      _    ____ ___ _____ ___ ___  _   _    _    _
  //   |_   _|  _ \    / \  |  _ \_ _|_   _|_ _/ _ \| \ | |  / \  | |
  //     | | | |_) |  / _ \ | | | | |  | |  | | | | |  \| | / _ \ | |
  //     | | |  _ <  / ___ \| |_| | |  | |  | | |_| | |\  |/ ___ \| |___
  //     |_| |_| \_\/_/   \_\____/___| |_| |___\___/|_| \_/_/   \_\_____|
  //

  public function get_registration_content_chinese_traditional()
  {
    $output_data = array(

      "title_data" => array(
        "name" => "稱謂*",
        "placeholder" => "Select one",
        "options" => array(
          array(
            "label" => "先生",
            "value" => "MR",
          ),
          array(
            "label" => "女士",
            "value" => "MS",
          ),
          array(
            "label" => "太太",
            "value" => "MDM",
          ),
        ),
      ),

      "first_name_data" => array(
        "name" => "名字*",
        "placeholder" => "",
      ),

      "last_name_data" => array(
        "name" => "姓氏*",
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
        "name" => "出生日期*",
        "placeholder" => "DD/MM/YYYY",
      ),

      "nationality_data" => array(
        "name" => "國籍*",
        "placeholder" => "Select one",
        "options" => array(
          array(
            "label" => "中國內地",
            "value" => "CHINA",
          ),
          array(
            "label" => "香港特別行政區",
            "value" => "HONG KONG",
          ),
          array(
            "label" => "印度尼西亞",
            "value" => "INDONESIA",
          ),
          array(
            "label" => "馬來西亞",
            "value" => "MALAYSIA",
          ),
          array(
            "label" => "新加坡",
            "value" => "SINGAPORE",
          ),
          array(
            "label" => "台灣",
            "value" => "TAIWAN",
          ),
          array(
            "label" => "泰國",
            "value" => "THAILAND",
          ),
          array(
            "label" => "加拿大",
            "value" => "CANADA",
          ),
          array(
            "label" => "美國",
            "value" => "USA",
          ),
          array(
            "label" => "馬爾代夫",
            "value" => "MALDIVES",
          ),
          array(
            "label" => "俄國",
            "value" => "RUSSIA",
          ),
          array(
            "label" => "埃及",
            "value" => "EGYPT",
          ),
          array(
            "label" => "阿爾及利亞",
            "value" => "ALGERIA",
          ),
          array(
            "label" => "毛里求斯",
            "value" => "MAURITIUS",
          ),
          array(
            "label" => "津巴布韋",
            "value" => "ZIMBABWE",
          ),
          array(
            "label" => "南非",
            "value" => "SOUTH AFRICA",
          ),
          array(
            "label" => "荷蘭",
            "value" => "NETHERLANDS",
          ),
          array(
            "label" => "比利時",
            "value" => "BELGIUM",
          ),
          array(
            "label" => "法國",
            "value" => "FRANCE",
          ),
          array(
            "label" => "西班牙",
            "value" => "SPAIN",
          ),
          array(
            "label" => "馬耳他",
            "value" => "MALTA",
          ),
          array(
            "label" => "匈牙利",
            "value" => "HUNGARY",
          ),
          array(
            "label" => "意大利",
            "value" => "ITALY",
          ),
          array(
            "label" => "羅馬尼亞",
            "value" => "ROMANIA",
          ),
          array(
            "label" => "瑞士",
            "value" => "SWITZERLAND",
          ),
          array(
            "label" => "奧地利",
            "value" => "AUSTRIA",
          ),
          array(
            "label" => "英國",
            "value" => "UNITED KINGDOM",
          ),
          array(
            "label" => "丹麥",
            "value" => "DENMARK",
          ),
          array(
            "label" => "瑞典",
            "value" => "SWEDEN",
          ),
          array(
            "label" => "挪威",
            "value" => "NORWAY",
          ),
          array(
            "label" => "波蘭",
            "value" => "POLAND",
          ),
          array(
            "label" => "德國",
            "value" => "GERMANY",
          ),
          array(
            "label" => "洪都拉斯",
            "value" => "HONDURAS",
          ),
          array(
            "label" => "葡萄牙",
            "value" => "PORTUGAL",
          ),
          array(
            "label" => "墨西哥",
            "value" => "MEXICO",
          ),
          array(
            "label" => "澳門特別行政區",
            "value" => "MACAU",
          ),
          array(
            "label" => "阿根廷",
            "value" => "ARGENTINA",
          ),
          array(
            "label" => "巴西",
            "value" => "BRAZIL",
          ),
          array(
            "label" => "智利",
            "value" => "CHILE",
          ),
          array(
            "label" => "芬蘭",
            "value" => "FINLAND",
          ),
          array(
            "label" => "澳大利亞",
            "value" => "AUSTRALIA",
          ),
          array(
            "label" => "菲律賓",
            "value" => "PHILIPPINES",
          ),
          array(
            "label" => "新西蘭",
            "value" => "NEW ZEALAND",
          ),
          array(
            "label" => "泰國",
            "value" => "THAILAND",
          ),
          array(
            "label" => "汶萊",
            "value" => "BRUNEI",
          ),
          array(
            "label" => "愛爾蘭",
            "value" => "IRELAND",
          ),
          array(
            "label" => "巴布亞新幾內亞",
            "value" => "PAPUA N. GUINEA",
          ),
          array(
            "label" => "波多黎各",
            "value" => "PUERTO RICO",
          ),
          array(
            "label" => "韓國",
            "value" => "KOREA",
          ),
          array(
            "label" => "日本",
            "value" => "JAPAN",
          ),
          array(
            "label" => "越南",
            "value" => "VIETNAM",
          ),
          array(
            "label" => "孟加拉國",
            "value" => "BANGLADESH",
          ),
          array(
            "label" => "諾魯",
            "value" => "NAURU",
          ),
          array(
            "label" => "印度",
            "value" => "INDIA",
          ),
          array(
            "label" => "巴基斯坦",
            "value" => "PAKISTAN",
          ),
          array(
            "label" => "斯里蘭卡",
            "value" => "SRI LANKA",
          ),
          array(
            "label" => "緬甸",
            "value" => "MYANMAR",
          ),
          array(
            "label" => "沙特阿拉伯和科威特",
            "value" => "SAUDI ARABIA AND KUWAIT",
          ),
          array(
            "label" => "阿聯酋",
            "value" => "UAE",
          ),
          array(
            "label" => "伊朗",
            "value" => "IRAN",
          ),
          array(
            "label" => "柬埔寨",
            "value" => "CAMBODIA",
          ),
        ),
      ),

      "doc_type_data" => array(
        "name" => "證件類別",
        "placeholder" => "Select one",
        "options" => array(
          array(
            "label" => "身分證",
            "value" => "IC",
          ),
          array(
            "label" => "護照",
            "value" => "PP",
          ),
        ),
      ),
      
      "doc_no_data" => array(
        "name" => "護照／身份證號碼",
        "placeholder" => "",
      ),

      "doc_country_data" => array(
        "name" => "旅遊證件(發證國家 / 地區)",
        "placeholder" => "Select one",
        "options" => array(
          array(
            "label" => "中國內地",
            "value" => "CHINA",
          ),
          array(
            "label" => "香港特別行政區",
            "value" => "HONG KONG",
          ),
          array(
            "label" => "印度尼西亞",
            "value" => "INDONESIA",
          ),
          array(
            "label" => "馬來西亞",
            "value" => "MALAYSIA",
          ),
          array(
            "label" => "新加坡",
            "value" => "SINGAPORE",
          ),
          array(
            "label" => "台灣",
            "value" => "TAIWAN",
          ),
          array(
            "label" => "泰國",
            "value" => "THAILAND",
          ),
          array(
            "label" => "加拿大",
            "value" => "CANADA",
          ),
          array(
            "label" => "美國",
            "value" => "USA",
          ),
          array(
            "label" => "馬爾代夫",
            "value" => "MALDIVES",
          ),
          array(
            "label" => "俄國",
            "value" => "RUSSIA",
          ),
          array(
            "label" => "埃及",
            "value" => "EGYPT",
          ),
          array(
            "label" => "阿爾及利亞",
            "value" => "ALGERIA",
          ),
          array(
            "label" => "毛里求斯",
            "value" => "MAURITIUS",
          ),
          array(
            "label" => "津巴布韋",
            "value" => "ZIMBABWE",
          ),
          array(
            "label" => "南非",
            "value" => "SOUTH AFRICA",
          ),
          array(
            "label" => "荷蘭",
            "value" => "NETHERLANDS",
          ),
          array(
            "label" => "比利時",
            "value" => "BELGIUM",
          ),
          array(
            "label" => "法國",
            "value" => "FRANCE",
          ),
          array(
            "label" => "西班牙",
            "value" => "SPAIN",
          ),
          array(
            "label" => "馬耳他",
            "value" => "MALTA",
          ),
          array(
            "label" => "匈牙利",
            "value" => "HUNGARY",
          ),
          array(
            "label" => "意大利",
            "value" => "ITALY",
          ),
          array(
            "label" => "羅馬尼亞",
            "value" => "ROMANIA",
          ),
          array(
            "label" => "瑞士",
            "value" => "SWITZERLAND",
          ),
          array(
            "label" => "奧地利",
            "value" => "AUSTRIA",
          ),
          array(
            "label" => "英國",
            "value" => "UNITED KINGDOM",
          ),
          array(
            "label" => "丹麥",
            "value" => "DENMARK",
          ),
          array(
            "label" => "瑞典",
            "value" => "SWEDEN",
          ),
          array(
            "label" => "挪威",
            "value" => "NORWAY",
          ),
          array(
            "label" => "波蘭",
            "value" => "POLAND",
          ),
          array(
            "label" => "德國",
            "value" => "GERMANY",
          ),
          array(
            "label" => "洪都拉斯",
            "value" => "HONDURAS",
          ),
          array(
            "label" => "葡萄牙",
            "value" => "PORTUGAL",
          ),
          array(
            "label" => "墨西哥",
            "value" => "MEXICO",
          ),
          array(
            "label" => "澳門特別行政區",
            "value" => "MACAU",
          ),
          array(
            "label" => "阿根廷",
            "value" => "ARGENTINA",
          ),
          array(
            "label" => "巴西",
            "value" => "BRAZIL",
          ),
          array(
            "label" => "智利",
            "value" => "CHILE",
          ),
          array(
            "label" => "芬蘭",
            "value" => "FINLAND",
          ),
          array(
            "label" => "澳大利亞",
            "value" => "AUSTRALIA",
          ),
          array(
            "label" => "菲律賓",
            "value" => "PHILIPPINES",
          ),
          array(
            "label" => "新西蘭",
            "value" => "NEW ZEALAND",
          ),
          array(
            "label" => "泰國",
            "value" => "THAILAND",
          ),
          array(
            "label" => "汶萊",
            "value" => "BRUNEI",
          ),
          array(
            "label" => "愛爾蘭",
            "value" => "IRELAND",
          ),
          array(
            "label" => "巴布亞新幾內亞",
            "value" => "PAPUA N. GUINEA",
          ),
          array(
            "label" => "波多黎各",
            "value" => "PUERTO RICO",
          ),
          array(
            "label" => "韓國",
            "value" => "KOREA",
          ),
          array(
            "label" => "日本",
            "value" => "JAPAN",
          ),
          array(
            "label" => "越南",
            "value" => "VIETNAM",
          ),
          array(
            "label" => "孟加拉國",
            "value" => "BANGLADESH",
          ),
          array(
            "label" => "諾魯",
            "value" => "NAURU",
          ),
          array(
            "label" => "印度",
            "value" => "INDIA",
          ),
          array(
            "label" => "巴基斯坦",
            "value" => "PAKISTAN",
          ),
          array(
            "label" => "斯里蘭卡",
            "value" => "SRI LANKA",
          ),
          array(
            "label" => "緬甸",
            "value" => "MYANMAR",
          ),
          array(
            "label" => "沙特阿拉伯和科威特",
            "value" => "SAUDI ARABIA AND KUWAIT",
          ),
          array(
            "label" => "阿聯酋",
            "value" => "UAE",
          ),
          array(
            "label" => "伊朗",
            "value" => "IRAN",
          ),
          array(
            "label" => "柬埔寨",
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
            "label" => "公司持有人/合夥人",
            "value" => "Business owner/Partner",
          ),
          array(
            "label" => "辦公室員工",
            "value" => "Other office worker",
          ),
          array(
            "label" => "專業/技術人員",
            "value" => "Professional / Technical",
          ),
          array(
            "label" => "退休，非在職人士，家庭主婦及/或學生",
            "value" => "Retired,unemployed,housewife,student",
          ),
          array(
            "label" => "高級/行政管理人",
            "value" => "Senior/Executive management",
          ),
          array(
            "label" => "其他",
            "value" => "Others",
          ),
          

        ),
      ),

      "nature_of_business_data" => array(
        "name" => "Nature of business",
        "placeholder" => "Select one",
        "options" => array(
          array(
            "label" => "農業、礦業、林業",
            "value" => "Agriculture, Mining & Forestry",
          ),
          array(
            "label" => "建築業/物流業/通訊業/公共建設",
            "value" => "Construction/Transpo/Comm/Utililities",
          ),
          array(
            "label" => "金融服務- 銀行、保險、資產管理",
            "value" => "Financial Services - Banking, Insurance",
          ),
          array(
            "label" => "金融服務- 其他",
            "value" => "Financial Services - Other",
          ),
          array(
            "label" => "一般業務/自僱",
            "value" => "General Business/Self Employed",
          ),
          array(
            "label" => "政府/公營部門",
            "value" => "Government/Public Sector",
          ),
          array(
            "label" => "酒店&旅遊(如酒店，旅遊中介)",
            "value" => "Hospitality & Tourism",
          ),
          array(
            "label" => "非牟利/慈善機構",
            "value" => "Non-Profit/Charity Organization",
          ),
          array(
            "label" => "其他/無",
            "value" => "Others/None",
          ),
          array(
            "label" => "專業服務：法律、會計或諮詢",
            "value" => "Professional Services:Law,Accounting",
          ),
          array(
            "label" => "專業服務：其他",
            "value" => "Professional Services:Others",
          ),
          array(
            "label" => "房地產",
            "value" => "Real Estate",
          ),
          array(
            "label" => "製造業：防禦品",
            "value" => "Manufacturing:Defense Goods",
          ),
          array(
            "label" => "貿易：防禦品",
            "value" => "Trading Business:Defense Goods",
          ),
          array(
            "label" => "貿易：進/出口",
            "value" => "Trading Business:Import/Export",
          ),
          array(
            "label" => "製造業：珠寶及/或貴金屬",
            "value" => "Manufacturing:Jewelry/Precious Metals",
          ),
          array(
            "label" => "貿易: 珠寶及/或貴金屬",
            "value" => "Trading Business:Jewelry/Precious Metals",
          ),
          array(
            "label" => "貿易：其他",
            "value" => "Trading Business:Others",
          ),
          array(
            "label" => "製造業：其他",
            "value" => "Manufacturing:Others",
          ),
        ),
      ),

      "email_data" => array(
        "name" => "電郵地址*",
        "placeholder" => "",
      ),

      "mobile_country_data" => array(
        "name" => "手提電話號碼*",
        "placeholder" => "Select one",
        "options" => array(
          array(
            "label" => "中國內地 (86)",
            "value" => "86",
          ),
          array(
            "label" => "香港特別行政區 (852)",
            "value" => "852",
          ),
          array(
            "label" => "印度尼西亞 (62)",
            "value" => "62",
          ),
          array(
            "label" => "馬來西亞 (60)",
            "value" => "60",
          ),
          array(
            "label" => "新加坡 (65)",
            "value" => "65",
          ),
          array(
            "label" => "台灣 (886)",
            "value" => "886",
          ),
          array(
            "label" => "泰國 (66)",
            "value" => "66",
          ),
          array(
            "label" => "加拿大 (00)",
            "value" => "00",
          ),
          array(
            "label" => "美國 (01)",
            "value" => "01",
          ),
          array(
            "label" => "馬爾代夫 (06)",
            "value" => "06",
          ),
          array(
            "label" => "俄國 (07)",
            "value" => "07",
          ),
          array(
            "label" => "埃及 (20)",
            "value" => "20",
          ),
          array(
            "label" => "阿爾及利亞 (21)",
            "value" => "21",
          ),
          array(
            "label" => "毛里求斯 (23)",
            "value" => "23",
          ),
          array(
            "label" => "津巴布韋 (26)",
            "value" => "26",
          ),
          array(
            "label" => "南非 (27)",
            "value" => "27",
          ),
          array(
            "label" => "荷蘭 (31)",
            "value" => "31",
          ),
          array(
            "label" => "比利時 (32)",
            "value" => "32",
          ),
          array(
            "label" => "法國 (33)",
            "value" => "33",
          ),
          array(
            "label" => "西班牙 (34)",
            "value" => "34",
          ),
          array(
            "label" => "馬耳他 (35)",
            "value" => "35",
          ),
          array(
            "label" => "匈牙利 (36)",
            "value" => "36",
          ),
          array(
            "label" => "意大利 (39)",
            "value" => "39",
          ),
          array(
            "label" => "羅馬尼亞 (40)",
            "value" => "40",
          ),
          array(
            "label" => "瑞士 (41)",
            "value" => "41",
          ),
          array(
            "label" => "奧地利 (43)",
            "value" => "43",
          ),
          array(
            "label" => "英國 (44)",
            "value" => "44",
          ),
          array(
            "label" => "丹麥 (45)",
            "value" => "45",
          ),
          array(
            "label" => "瑞典 (46)",
            "value" => "46",
          ),
          array(
            "label" => "挪威 (47)",
            "value" => "47",
          ),
          array(
            "label" => "波蘭 (48)",
            "value" => "48",
          ),
          array(
            "label" => "德國 (49)",
            "value" => "49",
          ),
          array(
            "label" => "洪都拉斯 (50)",
            "value" => "50",
          ),
          array(
            "label" => "葡萄牙 (51)",
            "value" => "51",
          ),
          array(
            "label" => "墨西哥 (52)",
            "value" => "52",
          ),
          array(
            "label" => "澳門特別行政區 (53)",
            "value" => "53",
          ),
          array(
            "label" => "阿根廷 (54)",
            "value" => "54",
          ),
          array(
            "label" => "巴西 (55)",
            "value" => "55",
          ),
          array(
            "label" => "智利 (56)",
            "value" => "56",
          ),
          array(
            "label" => "芬蘭 (58)",
            "value" => "58",
          ),
          array(
            "label" => "澳大利亞 (61)",
            "value" => "61",
          ),
          array(
            "label" => "菲律賓 (63)",
            "value" => "63",
          ),
          array(
            "label" => "新西蘭 (64)",
            "value" => "64",
          ),
          array(
            "label" => "泰國 (66)",
            "value" => "66",
          ),
          array(
            "label" => "汶萊 (67)",
            "value" => "67",
          ),
          array(
            "label" => "愛爾蘭 (72)",
            "value" => "72",
          ),
          array(
            "label" => "巴布亞新幾內亞 (75)",
            "value" => "75",
          ),
          array(
            "label" => "波多黎各 (78)",
            "value" => "78",
          ),
          array(
            "label" => "韓國 (80)",
            "value" => "80",
          ),
          array(
            "label" => "日本 (81)",
            "value" => "81",
          ),
          array(
            "label" => "越南 (84)",
            "value" => "84",
          ),
          array(
            "label" => "孟加拉國 (89)",
            "value" => "89",
          ),
          array(
            "label" => "諾魯 (90)",
            "value" => "90",
          ),
          array(
            "label" => "印度 (91)",
            "value" => "91",
          ),
          array(
            "label" => "巴基斯坦 (92)",
            "value" => "92",
          ),
          array(
            "label" => "斯里蘭卡 (94)",
            "value" => "94",
          ),
          array(
            "label" => "緬甸 (95)",
            "value" => "95",
          ),
          array(
            "label" => "沙特阿拉伯和科威特 (96)",
            "value" => "96",
          ),
          array(
            "label" => "阿聯酋 (97)",
            "value" => "97",
          ),
          array(
            "label" => "伊朗 (98)",
            "value" => "98",
          ),
          array(
            "label" => "柬埔寨 (855)",
            "value" => "855",
          ),
        ),
      ),

      "mobile_number_data" => array(
        "name" => "",
        "placeholder" => "",
      ),

      "address_line_01_data" => array(
        "name" => "郵寄地址*",
        "placeholder" => "",
      ),

      "address_country_data" => array(
        "name" => "國家",
        "placeholder" => "Select one",
        "options" => array(
          array(
            "label" => "中國內地",
            "value" => "CHINA",
          ),
          array(
            "label" => "香港特別行政區",
            "value" => "HONG KONG",
          ),
          array(
            "label" => "印度尼西亞",
            "value" => "INDONESIA",
          ),
          array(
            "label" => "馬來西亞",
            "value" => "MALAYSIA",
          ),
          array(
            "label" => "新加坡",
            "value" => "SINGAPORE",
          ),
          array(
            "label" => "台灣",
            "value" => "TAIWAN",
          ),
          array(
            "label" => "泰國",
            "value" => "THAILAND",
          ),
          array(
            "label" => "加拿大",
            "value" => "CANADA",
          ),
          array(
            "label" => "美國",
            "value" => "USA",
          ),
          array(
            "label" => "馬爾代夫",
            "value" => "MALDIVES",
          ),
          array(
            "label" => "俄國",
            "value" => "RUSSIA",
          ),
          array(
            "label" => "埃及",
            "value" => "EGYPT",
          ),
          array(
            "label" => "阿爾及利亞",
            "value" => "ALGERIA",
          ),
          array(
            "label" => "毛里求斯",
            "value" => "MAURITIUS",
          ),
          array(
            "label" => "津巴布韋",
            "value" => "ZIMBABWE",
          ),
          array(
            "label" => "南非",
            "value" => "SOUTH AFRICA",
          ),
          array(
            "label" => "荷蘭",
            "value" => "NETHERLANDS",
          ),
          array(
            "label" => "比利時",
            "value" => "BELGIUM",
          ),
          array(
            "label" => "法國",
            "value" => "FRANCE",
          ),
          array(
            "label" => "西班牙",
            "value" => "SPAIN",
          ),
          array(
            "label" => "馬耳他",
            "value" => "MALTA",
          ),
          array(
            "label" => "匈牙利",
            "value" => "HUNGARY",
          ),
          array(
            "label" => "意大利",
            "value" => "ITALY",
          ),
          array(
            "label" => "羅馬尼亞",
            "value" => "ROMANIA",
          ),
          array(
            "label" => "瑞士",
            "value" => "SWITZERLAND",
          ),
          array(
            "label" => "奧地利",
            "value" => "AUSTRIA",
          ),
          array(
            "label" => "英國",
            "value" => "UNITED KINGDOM",
          ),
          array(
            "label" => "丹麥",
            "value" => "DENMARK",
          ),
          array(
            "label" => "瑞典",
            "value" => "SWEDEN",
          ),
          array(
            "label" => "挪威",
            "value" => "NORWAY",
          ),
          array(
            "label" => "波蘭",
            "value" => "POLAND",
          ),
          array(
            "label" => "德國",
            "value" => "GERMANY",
          ),
          array(
            "label" => "洪都拉斯",
            "value" => "HONDURAS",
          ),
          array(
            "label" => "葡萄牙",
            "value" => "PORTUGAL",
          ),
          array(
            "label" => "墨西哥",
            "value" => "MEXICO",
          ),
          array(
            "label" => "澳門特別行政區",
            "value" => "MACAU",
          ),
          array(
            "label" => "阿根廷",
            "value" => "ARGENTINA",
          ),
          array(
            "label" => "巴西",
            "value" => "BRAZIL",
          ),
          array(
            "label" => "智利",
            "value" => "CHILE",
          ),
          array(
            "label" => "芬蘭",
            "value" => "FINLAND",
          ),
          array(
            "label" => "澳大利亞",
            "value" => "AUSTRALIA",
          ),
          array(
            "label" => "菲律賓",
            "value" => "PHILIPPINES",
          ),
          array(
            "label" => "新西蘭",
            "value" => "NEW ZEALAND",
          ),
          array(
            "label" => "泰國",
            "value" => "THAILAND",
          ),
          array(
            "label" => "汶萊",
            "value" => "BRUNEI",
          ),
          array(
            "label" => "愛爾蘭",
            "value" => "IRELAND",
          ),
          array(
            "label" => "巴布亞新幾內亞",
            "value" => "PAPUA N. GUINEA",
          ),
          array(
            "label" => "波多黎各",
            "value" => "PUERTO RICO",
          ),
          array(
            "label" => "韓國",
            "value" => "KOREA",
          ),
          array(
            "label" => "日本",
            "value" => "JAPAN",
          ),
          array(
            "label" => "越南",
            "value" => "VIETNAM",
          ),
          array(
            "label" => "孟加拉國",
            "value" => "BANGLADESH",
          ),
          array(
            "label" => "諾魯",
            "value" => "NAURU",
          ),
          array(
            "label" => "印度",
            "value" => "INDIA",
          ),
          array(
            "label" => "巴基斯坦",
            "value" => "PAKISTAN",
          ),
          array(
            "label" => "斯里蘭卡",
            "value" => "SRI LANKA",
          ),
          array(
            "label" => "緬甸",
            "value" => "MYANMAR",
          ),
          array(
            "label" => "沙特阿拉伯和科威特",
            "value" => "SAUDI ARABIA AND KUWAIT",
          ),
          array(
            "label" => "阿聯酋",
            "value" => "UAE",
          ),
          array(
            "label" => "伊朗",
            "value" => "IRAN",
          ),
          array(
            "label" => "柬埔寨",
            "value" => "CAMBODIA",
          ),
        ),
      ),

      "address_state_data" => array(
        "name" => "州/省*",
        "placeholder" => "",
      ),

      "address_city_data" => array(
        "name" => "市*",
        "placeholder" => "",
      ),

      "address_postal_code_data" => array(
        "name" => "郵政編碼*",
        "placeholder" => "",
      ),

      "preferred_language_data" => array(
        "name" => "通訊語言",
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
        "name" => "PIN碼",
        "placeholder" => "",
      ),

      "pin_confirm_data" => array(
        "name" => "確定PIN碼",
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


}
