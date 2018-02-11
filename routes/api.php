<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'cruise'], function(){
    Route::get('get_valid_search_parameters', 'CruiseController@get_valid_search_parameters');
    Route::get('get_home_itineraries', 'CruiseController@get_home_itineraries');
    Route::get('get_itineraries', 'CruiseController@get_itineraries');
});

Route::group(['prefix' => 'seaware/test'], function(){
    Route::get('merchentlogin', 'Test\\SeawareApiTest@merchantLogin');
    Route::get('merchentsession', 'Test\\SeawareApiTest@retriveMerchent');
    Route::get('OTA_CruiseSailAvailRQ', 'Test\\SeawareApiTest@otaCruiseSailAvail');
    Route::get('OTA_CruiseFareAvailRQ', 'Test\\SeawareApiTest@otaCruiseFareAvail');
    Route::get('OTA_CruiseCategoryAvailRQ', 'Test\\SeawareApiTest@otaCruiseCategoryAvail');
    Route::get('OTA_CruiseCabinAvailRQ', 'Test\\SeawareApiTest@otaCruiseCabinAvailRQ');
    Route::get('OTA_CruisePriceBookingRQ', 'Test\\SeawareApiTest@otaCruiseCabinAvailRQ');
    Route::get('OTA_CruiseBookRQ', 'Test\\SeawareApiTest@otaCruiseCabinAvailRQ');
    Route::get('OTA_CruiseBookingDocumentRQ', 'Test\\SeawareApiTest@otaCruiseBookingDocumentRQ');
});