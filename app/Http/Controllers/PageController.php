<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{


  
  public function get_home_content()
  {
    
    $output_data = array(
      
    );

    $output_json = json_encode($output_data);

    return $output_json;
  }

  
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
            "image_mobile" => "",
          ),
          array(
            "title" => "Plan a cruise trip with genting rewards at sea",
            "subtitle" => "Find out membership benefits",
            "image" => "",
            "image_tablet" => "",
            "image_mobile" => "",
          ),
          array(
            "title" => "Plan a cruise trip with genting rewards at sea",
            "subtitle" => "Find out membership benefits",
            "image" => "",
            "image_tablet" => "",
            "image_mobile" => "",
          ),
        ),
      ),
      "membership_content" => array(
        "title" => "Membership benefits & how to use",
        "item_array" => array(
          array(
            "icon" => "absoluteurl/icon-01.png",
            "title" => "Benefit 1",
          ),
          array(
            "icon" => "absoluteurl/icon-02.png",
            "title" => "Benefit 2",
          ),
          array(
            "icon" => "absoluteurl/icon-03.png",
            "title" => "Benefit 3",
          ),
          array(
            "icon" => "absoluteurl/icon-04.png",
            "title" => "Benefit 4",
          ),
          array(
            "icon" => "absoluteurl/icon-05.png",
            "title" => "Save",
          ),
          array(
            "icon" => "absoluteurl/icon-06.png",
            "title" => "Spend",
          ),
          array(
            "icon" => "absoluteurl/icon-07.png",
            "title" => "Enjoy",
          ),
        ),
        "cta_array" => array(
          array(
            "copy" => "Read more",
            "url" => "https://www.google.com.sg",
          ),
          array(
            "copy" => "Join now",
            "url" => "https://www.google.com.sg",
          ),
        ),
      ),
      "ship_content" => array(
        "ship_array" => array(
          array(
            "name" => "Ship 01",
            "ship_code" => "SSQ",
            "url" => "",
          ),
          array(
            "name" => "Ship 02",
            "ship_code" => "SSS",
            "url" => "",
          ),
        ),
      ),
      "faq_content" => array(
        "title" => "Have more questions?",
        "join_cta_copy" => "Join Now",
        "join_cta_link" => "https://www.google.com.sg",
      ),
    );
  

    $output_json = json_encode($output_data);

    return $output_json;
  }

  
  

}
