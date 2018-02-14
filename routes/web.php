<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
  // return view('welcome');
  return view('pages/home/home-nonmember');

  // if logged in without booking
  // return view('pages/home/home-member-without-booking');
  
  // if logged in with booking
  // return view('pages/home/home-member-with-booking');
  
});





Route::get('/redeem', function () { return view('pages/redeem/primary-search'); });
Route::get('/redeem/cabin', function () { return view('pages/redeem/cabin-type-rates'); });
Route::get('/redeem/summary', function () { return view('pages/redeem/summary'); });



Route::get('/checkout/guest-details', function () { return view('pages/checkout/summary'); });
Route::get('/checkout/payment', function () { return view('pages/checkout/payment'); });
Route::get('/checkout/thank-you', function () { return view('pages/checkout/thank-you'); });


Route::get('/register', function () { return view('pages/account/register'); });
Route::get('/login', function () { return view('pages/account/login'); });


// if user is logged in
Route::get('/account', function () { return view('pages/account/dashboard'); });
Route::get('/account/edit-profile', function () { return view('pages/account/edit-profile'); });
Route::get('/account/transaction-history', function () { return view('pages/account/transaction-history'); });
Route::get('/account/booking-history', function () { return view('pages/account/booking-history'); });


//    ____ _____  _  _____ ___ ____
//   / ___|_   _|/ \|_   _|_ _/ ___|
//   \___ \ | | / _ \ | |  | | |
//    ___) || |/ ___ \| |  | | |___
//   |____/ |_/_/   \_\_| |___\____|
//



Route::get('/membership', function () { return view('pages/static/membership'); });
Route::get('/membership/overview', function () { return view('pages/static/membership-overview'); });
Route::get('/membership/how-to-redeem', function () { return view('pages/static/membership-how-to-redeem'); });
Route::get('/faq', function () { return view('pages/static/faq'); });
Route::get('/contact', function () { return view('pages/static/welcome'); });

// Route::get('/ship-detail', function () { 
//   return view('welcome');
// });
  































Route::get('xtopia', function () {
    // return view('welcome');
  return 'xtopia';
});

Route::get('drs', function() {
  return 'drs';
});

Route::get('seaware', 'SoapController@show');

Route::get('fetch_seaware_csv', 'FetchSeawareCsvController@index');

Route::resource('cabin_inventory', 'CabinInventoryController');

















//    _   _ ____  _____ ____
//   | | | / ___|| ____|  _ \
//   | | | \___ \|  _| | |_) |
//   | |_| |___) | |___|  _ <
//    \___/|____/|_____|_| \_\
//

// calls related to user data

Route::get('/user/get', 'UserController@get_user');
Route::get('/user/create', 'UserController@create_user');
Route::get('/user/edit', 'UserController@edit_user');
Route::get('/user/login', 'UserController@login_user');




//    ____   _    ____ _____
//   |  _ \ / \  / ___| ____|
//   | |_) / _ \| |  _|  _|
//   |  __/ ___ \ |_| | |___
//   |_| /_/   \_\____|_____|
//

// calls related to the content of pages in a site
// we can bundle a couple of calls together as page content calls to reduce the amount of calls the user has to make

Route::get('/page/get_home_content', 'PageController@get_home_content');
Route::get('/page/get_home_content_nonmember', 'PageController@get_home_content_nonmember');



//     ____ ____  _   _ ___ ____  _____
//    / ___|  _ \| | | |_ _/ ___|| ____|
//   | |   | |_) | | | || |\___ \|  _|
//   | |___|  _ <| |_| || | ___) | |___
//    \____|_| \_\\___/|___|____/|_____|
//

// calls related to the cruises

Route::get('/cruise/get_itineraries', 'CruiseController@get_itineraries');
Route::get('/cruise/get_valid_search_parameters', 'CruiseController@get_valid_search_parameters');
Route::get('/cruise/get_home_itineraries', 'CruiseController@get_home_itineraries');
Route::get('/cruise/get_home_itineraries_nonmember', 'CruiseController@get_home_itineraries_nonmember');
Route::get('/cruise/get_best_redeemable_cruise', 'CruiseController@get_best_redeemable_cruise');
Route::get('/cruise/get_cabin_prices', 'CruiseController@get_cabin_prices');
Route::get('/cruise/get_home_cruise_details', 'CruiseController@get_home_cruise_details');




//    ____   ___   ___  _  _____ _   _  ____
//   | __ ) / _ \ / _ \| |/ /_ _| \ | |/ ___|
//   |  _ \| | | | | | | ' / | ||  \| | |  _
//   | |_) | |_| | |_| | . \ | || |\  | |_| |
//   |____/ \___/ \___/|_|\_\___|_| \_|\____|
//

// booking a cabin

Route::get('/booking/book_cruise', 'BookingController@book_cruise');
Route::get('/booking/get_booking_details', 'BookingController@get_booking_details');

