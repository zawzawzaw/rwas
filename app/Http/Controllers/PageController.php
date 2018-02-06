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

  
  

}
